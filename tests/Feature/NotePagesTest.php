<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotePagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_notes_without_timestamps_can_be_listed_and_read(): void
    {
        $user = User::factory()->create();
        $note = new Note(['body' => 'An older note worth keeping.', 'user_id' => $user->id]);
        $note->timestamps = false;
        $note->save();

        $this->actingAs($user)->get(route('notes.index'))
            ->assertOk()
            ->assertSee('Date unavailable')
            ->assertSee('An older note worth keeping.');

        $this->get(route('notes.show', $note))
            ->assertOk()
            ->assertSee('Date unavailable')
            ->assertSee('Update date unavailable')
            ->assertSee('An older note worth keeping.');
    }
}
