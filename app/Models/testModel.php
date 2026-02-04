<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

// model is like an instance to the 
class testModel extends Model
{

    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'body',
        'author_id'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, "author_id");
    }
}
