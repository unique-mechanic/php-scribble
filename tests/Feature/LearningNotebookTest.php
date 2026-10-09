<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LearningNotebookTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $overrides = []): array
    {
        return array_merge(['title' => 'Eloquent relationships', 'body' => 'One user has many notes.', 'type' => 'concept', 'status' => 'learning'], $overrides);
    }

    public function test_notebooks_are_personal_and_names_unique_per_user(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();
        $other->notebooks()->create(['name' => 'Private notebook']);
        $this->actingAs($user)->post('/notebooks', ['name' => 'Laravel'])->assertRedirect('/notebooks');
        $this->post('/notebooks', ['name' => 'Laravel'])->assertSessionHasErrors('name');
        $this->get('/notebooks')->assertOk()->assertSee('Laravel')->assertDontSee('Private notebook');
        $this->actingAs($other)->post('/notebooks', ['name' => 'Laravel'])->assertSessionHasNoErrors();
    }

    public function test_save_render_and_edit_a_complete_learning_note(): void
    {
        $user = User::factory()->create();
        $book = $user->notebooks()->create(['name' => 'Laravel']);
        $tag = $user->tags()->create(['name' => 'Database']);
        $this->actingAs($user)->post('/notes', $this->payload([
            'notebook_id' => $book->id, 'tags' => [$tag->id],
            'source_url' => 'https://laravel.com/docs', 'code' => '<script>alert("test")</script>', 'language' => 'html',
        ]))->assertSessionHasNoErrors();
        $note = $user->notes()->firstOrFail();
        $this->assertEquals($book->id, $note->notebook_id);
        $this->assertEquals([$tag->id], $note->tags->modelKeys());
        $this->get('/notes/'.$note->id)->assertOk()->assertSee('Still learning')->assertSee('Laravel')->assertSee('&lt;script&gt;', false)->assertDontSee('<script>alert(', false)->assertSee('https://laravel.com/docs', false);
        $this->get('/notes/'.$note->id.'/edit')->assertOk()->assertSee('Eloquent relationships')->assertSee('checked', false);
        $this->patch('/notes/'.$note->id, $this->payload(['notebook_id' => null, 'status' => 'reference']))->assertSessionHasNoErrors();
        $this->assertCount(0, $note->fresh()->tags);
        $this->assertNull($note->fresh()->notebook_id);
        $this->assertEquals('reference', $note->fresh()->status);
    }

    public function test_foreign_notebooks_tags_and_unsafe_links_are_rejected_without_saving(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();
        $book = $other->notebooks()->create(['name' => 'Private']);
        $tag = $other->tags()->create(['name' => 'Private']);
        $this->actingAs($user)->post('/notes', $this->payload(['notebook_id' => $book->id]))->assertSessionHasErrors('notebook_id');
        $this->post('/notes', $this->payload(['tags' => [$tag->id]]))->assertSessionHasErrors('tags.0');
        $this->post('/notes', $this->payload(['source_url' => 'javascript:alert(1)']))->assertSessionHasErrors('source_url');
        $this->assertDatabaseCount('notes', 0);
        $note = $other->notes()->create($this->payload());
        $this->get('/notes/'.$note->id)->assertForbidden();
        $this->patch('/notes/'.$note->id, $this->payload())->assertForbidden();
        $this->delete('/notes/'.$note->id)->assertForbidden();
    }

    public function test_search_and_combined_filters_remain_scoped_to_current_user(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();
        $book = $user->notebooks()->create(['name' => 'Laravel']);
        $tag = $user->tags()->create(['name' => 'Eloquent']);
        $target = $user->notes()->create($this->payload(['title' => 'Find me', 'body' => 'A relationship example', 'notebook_id' => $book->id, 'code' => 'SELECT notes']));
        $target->tags()->attach($tag);
        $user->notes()->create($this->payload(['title' => 'Another note', 'status' => 'reference']));
        $other->notes()->create($this->payload(['title' => 'Private Eloquent note']));
        $this->actingAs($user);
        foreach (['Eloquent', 'Find me', 'relationship example', 'SELECT'] as $search) {
            $this->get('/notes?'.http_build_query(['q' => $search]))->assertOk()->assertSee('Find me')->assertDontSee('Private Eloquent note');
        }
        $this->get('/notes?'.http_build_query(['q' => 'Eloquent', 'notebook' => $book->id, 'tag' => $tag->id, 'type' => 'concept', 'status' => 'learning']))->assertOk()->assertSee('Find me')->assertDontSee('Another note');
        $this->get('/notes?notebook=0')->assertOk()->assertSee('Another note')->assertDontSee('Find me');
        $this->get('/notes?q=nonexistent')->assertOk()->assertSee('Nothing matches just yet.');
    }

    public function test_templates_and_pagination_work(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        foreach (['concept', 'howto', 'solution', 'note'] as $type) {
            $this->get('/notes/create?type='.$type)->assertOk()->assertSee('Save note');
        }
        $this->get('/notes/create?type=solution')->assertSee('What caused it');
        for ($i = 1; $i <= 13; $i++) {
            $user->notes()->create($this->payload(['title' => 'Lesson '.$i]));
        }
        $response = $this->get('/notes?status=learning');
        $response->assertOk()->assertSee('13 notes found')->assertSee('page=2', false);
        $this->assertCount(12, $response->viewData('notes')->items());
        $this->assertCount(1, $this->get('/notes?status=learning&page=2')->assertOk()->viewData('notes')->items());
    }
}
