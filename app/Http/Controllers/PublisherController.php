<?php

// cd D:\Server\web\test-lara\
// php artisan make:controller PublisherController
// Очистка кэша, при необходимости
// php artisan config:cache

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключается класс модели
use App\Models\Publisher;

// Подключается класс для валидации
use App\Http\Requests\PublisherRequest;

class PublisherController extends Controller
{
    // Список записей
	public function list()
	{
		/*
		$publisher = new Publisher();
		$rows = $publisher->all();
		dd($rows);
		*/
		// То же коротко
		//dd(Publisher::all());
		//
		//
		// Передача данных в шаблон
		$publisher = new Publisher();
		// Вывести все записи
		return view('publisher_list', ['rows' => $publisher->all()]);
		// Поиск записей по ID (доп. упаковка в массив)
		//return view('publisher_list', ['rows' => [$publisher->find(2)]]);
		// Одна запись (доп. упаковка в массив)
		//return view('publisher_list', ['rows' => [$publisher->inRandomOrder()->first()]]);
		// Несколько записей в случайном порядке
		//return view('publisher_list', ['rows' => $publisher->inRandomOrder()->get()]);
		// Несколько записей по порядку
		//return view('publisher_list', ['rows' => $publisher->orderBy('publisher_name', 'asc')->take(10)->skip(0)->where('publisher_name', '=', 'qwe')->get()]);
	}

    // Просмотр записи
	public function view($id)
	{
		$publisher = new Publisher();
		return view('publisher_view', ['row' => $publisher->find($id)]);
	}

	// Сохранение новой записи
	/*
	public function save(Request $row)
	{
		//return "Save OK";
		//dd($row);
		//dd($row->input('publisher_name'));
		$valid = $row->validate([
			'publisher_name' => 'required|min:1|max:255',
			'publisher_note' => 'required|min:5',
		]);
	}
	*/
    // Сохранение новой записи
	public function save(PublisherRequest $row)
	{
		//dd($row);
		//dd($row->input('publisher_name'));
		$publisher = new Publisher();
		$publisher->publisher_id = $row->input('publisher_id');
		$publisher->publisher_name = $row->input('publisher_name');
		$publisher->publisher_note = $row->input('publisher_note');
		$publisher->save();

		return redirect()->route('publisher-list')->with('success', 'Издатель был добавлен');
	}

    // Правка записи
	public function edit($id)
	{
		$publisher = new Publisher();
		return view('publisher_edit', ['row' => $publisher->find($id)]);
	}

    // Сохранение правки
	public function update($id, PublisherRequest $row)
	{
		$publisher = Publisher::find($id);
		// null //$publisher->publisher_id = $row->input('publisher_id');
		$publisher->publisher_name = $row->input('publisher_name');
		$publisher->publisher_note = $row->input('publisher_note');
		$publisher->save();

		return redirect()->route('publisher-view', $id)->with('success', 'Правка Издателя сохранена');
	}

    // Удаление записи
	public function del($id)
	{
		Publisher::find($id)->delete();

		return redirect()->route('publisher-list')->with('success', 'Издатель был удалён');
	}
}
