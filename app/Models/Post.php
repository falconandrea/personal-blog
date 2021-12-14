<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $guarded = [];

    protected $dates = ['date'];

    protected $casts = ['published' => 'boolean'];

    protected $allowedSorts = [
        'title',
        'date',
        'updated_at'
    ];

    protected $allowedFilters = [
        'title',
    ];

    public $appends = ['format_date'];

    public function getFormatDateAttribute()
    {
        return $this->date->format('d/m/Y');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
}
