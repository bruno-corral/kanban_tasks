<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'position',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
