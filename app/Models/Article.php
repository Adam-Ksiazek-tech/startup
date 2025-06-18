<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Dodanie pól dla formularza tworzącego artykuł
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'body',
        'publication_date',
        'add_user_id',
        'mod_user_id',
    ];

    /**
     * Relacja
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addUser()
    {
        return $this->belongsTo(User::class, 'add_user_id');
    }

    /**
     * Relacja
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modUser()
    {
        return $this->belongsTo(User::class, 'mod_user_id');
    }
}
