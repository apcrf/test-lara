<?php

// cd D:\Server\web\test-lara\
// php artisan make:controller ArtistController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключается класс модели
use App\Models\Artist;

// Подключается класс для валидации
use App\Http\Requests\ArtistRequest;

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
    public function add()
    {
        return view('artist_add');
    }

    // Сохранение новой записи
    public function save(ArtistRequest $row)
    {
        $artist = new Artist();
        $fields = [
            'artist_name', 'artist_note'
        ];
        foreach ( $fields as $v ) {
            $artist->{$v} = $row->input($v);
        }
        $artist->save();

        return redirect()->route('artist-list')->with('success', 'Артист был добавлен');
    }

    // Правка записи
	public function edit($id)
	{
        $artist = new Artist();
		return view('artist_edit', ['row' => $artist->find($id)]);
	}

    // Сохранение правки
	public function update($id, ArtistRequest $row)
	{
		$artist = Artist::find($id);
        $fields = [
            'artist_name', 'artist_note'
        ];
        foreach ( $fields as $v ) {
            $artist->{$v} = $row->input($v);
        }
		$artist->save();

		return redirect()->route('artist-list', $id)->with('success', 'Правка Артиста сохранена');
	}

    // Удаление записи
    public function del($id)
    {
        Artist::find($id)->delete();

        return redirect()->route('artist-list')->with('success', 'Артист был удалён');
    }

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
