<?php

// cd D:\Server\web\test-lara\
// php artisan make:controller ArtistController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключается класс модели
use App\Models\Artist;

class ArtistController extends Controller
{
    /**
     * Show list view
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $artists = Artist::simplePaginate(8);

        return view('artists', compact('artists'));
    }

    /**
     * REST API methods
     */

    public function indexAPI()
    {
        return Artist::all();
    }
 
    public function showAPI($id)
    {
        return Artist::find($id);
    }

    public function storeAPI(Request $request)
    {
        return Artist::create($request->all());
    }

    public function updateAPI($id, Request $request)
    {
        $artist = Artist::findOrFail($id);
        $artist->update($request->all());

        return $artist;
    }

    public function deleteAPI($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();

        return 204;
    }
}
