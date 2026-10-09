<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'notebook_id', 'title', 'type', 'status', 'source_url', 'code', 'language'];

    public const TYPES = ['note' => 'Free note', 'concept' => 'Concept', 'howto' => 'How-to', 'solution' => 'Problem → Solution'];

    public const STATUSES = ['reference' => 'Useful reference', 'learning' => 'Still learning'];

    public const TEMPLATES = [
        'note' => '',
        'concept' => "In my own words\n\nWhy it matters\n\nAn example\n\nQuestions I still have\n",
        'howto' => "What I want to do\n\nBefore you start\n\nSteps\n1. \n2. \n3. \n\nHow to check it worked\n",
        'solution' => "The problem or error\n\nWhat caused it\n\nWhat fixed it\n\nHow I verified the fix\n\nWhat I learned\n",
    ];

    public function notebook()
    {
        return $this->belongsTo(Notebook::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
