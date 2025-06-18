<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Dodanie pól dla formularza tworzącego artykuł
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'body',
        'publication_date',
        'user_id',
    ];

    /**
     * Relacja
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
