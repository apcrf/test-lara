<?php

// cd D:\Server\web\test-lara\
// php artisan make:controller ArtistController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключается класс модели
use App\Models\Artist;

class ArtistController extends Controller
{
    // Список записей
    public function listSimple()
    {
        $rows = Artist::simplePaginate(8);
        return view('artist_list_simple', compact('rows'));
    }

    // Список записей
    public function list()
    {
        $rows = Artist::paginate(6);
        return view('artist_list', compact('rows'));
    }

    // Добавление новой записи
    // add

    // Сохранение новой записи
    // save

    // Правка записи
    // edit

    // Сохранение правки
    // update

    // Удаление записи
    // del

    /*
    |--------------------------------------------------------------------------
    | REST API methods
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return Artist::all();
    }
 
    public function get($id)
    {
        return Artist::find($id);
    }

    public function post(Request $request)
    {
        return Artist::create($request->all());
    }

    public function put($id, Request $request)
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
