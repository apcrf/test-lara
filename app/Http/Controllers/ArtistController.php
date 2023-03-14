<?php

// cd D:\Server\web\test-lara\
// php artisan make:controller ArtistController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключается класс модели
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        return Artist::all();
    }
 
    public function show($id)
    {
        return Artist::find($id);
    }

    public function store(Request $request)
    {
        return Artist::create($request->all());
    }

    public function update($id, Request $request)
    {
        $artist = Artist::findOrFail($id);
        $artist->update($request->all());
        return $artist;
    }

    public function delete($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();
        return 204;
    }
}
