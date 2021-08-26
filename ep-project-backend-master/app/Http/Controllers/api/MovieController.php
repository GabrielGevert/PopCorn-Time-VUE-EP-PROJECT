<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Movies;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function getMovies()
    {
        return Movies::all();
    }

    public function getMovie(Movies $movie)
    {
        return response()->json([
            'success' => $movie
        ]);
    }

    public function setMovie(Request $request)
    {
        $newMovie = $request->movie;

        $movie = Movies::create($newMovie);

        return response()->json([
            'success' => $movie
        ]);
    }

    public function setFilter(Request $request, User $user)
    {
        $filter = $request->filter;
        $favorite_movies = $user['is_favorite'];
        $allMovies = Movies::query();

        $movies = $allMovies->when(Arr::get($filter, 'title'), function ($q) use ($filter) { 
            $q->where('name', $filter['title']);
        })->when(Arr::get($filter, 'year'), function ($q) use ($filter) {
            $q->where('year', $filter['year']);
        })->when(Arr::get($filter, 'relevance'), function ($q) use ($filter) {
            $q->where('relevance', $filter['relevance']);
        })->when(Arr::get($filter, 'gender'), function ($q) use ($filter) {
            $q->where('gender', $filter['gender']);
        })->when(Arr::get($filter, 'favorite') && Arr::get($filter, 'favorite') == 'Favoritos', function ($q) use ($favorite_movies) {
            $q->whereIn('id', $favorite_movies);
        })->latest('updated_at')->get();

        return response()->json([
            'success' => $movies, 
        ]);
    }
}
