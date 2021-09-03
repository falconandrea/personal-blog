<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Category extends Model
{
    use HasFactory, AsSource, Filterable;

    public $guarded = [];

    protected $allowedSorts = [
        'name',
        'created_at',
        'updated_at'
    ];

    protected $allowedFilters = [
        'name',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }
}
