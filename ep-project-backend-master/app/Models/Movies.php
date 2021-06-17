<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movies extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'year',
        'time',
        'relevance',
        'sinopse',
        'trailer',
        'thumbnail'
    ];

    protected $table = 'movies';

    protected $dates = [
        'updated_at',
        'created_at',
    ];
}
