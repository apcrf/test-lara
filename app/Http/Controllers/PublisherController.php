<?php

// D:\server\web\test-lara> php artisan make:controller PublisherController
//
// Очистка кэша, при необходимости
// D:\server\web\test-lara> php artisan config:cache

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключается класс для валидации
use App\Http\Requests\PublisherRequest;

// Подключаем класс модели
use App\Models\Publisher;

class PublisherController extends Controller
{
    // Сохранение записи
	/*
	public function save(Request $row) {
		//return "Save OK";
		//dd($row);
		//dd($row->input('publisher_name'));
		$valid = $row->validate([
			'publisher_name' => 'required|min:1|max:255',
			'publisher_note' => 'required|min:5',
		]);
	}
	*/
    // Сохранение записи
	public function save(PublisherRequest $row) {
		//dd($row);
		//dd($row->input('publisher_name'));
		$publisher = new Publisher();
		$publisher->publisher_id = $row->input('publisher_id');
		$publisher->publisher_name = $row->input('publisher_name');
		$publisher->publisher_note = $row->input('publisher_note');
		$publisher->save();

		return redirect()->route('homepage')->with('success', 'Издатель был добавлен');
	}

    // Список записей
	public function listing() {
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
		return view('publishers', ['rows' => $publisher->all()]);
		// Поиск записей по ID (доп. упаковка в массив)
		//return view('publishers', ['rows' => [$publisher->find(2)]]);
		// Одна запись (доп. упаковка в массив)
		//return view('publishers', ['rows' => [$publisher->inRandomOrder()->first()]]);
		// Несколько записей в случайном порядке
		//return view('publishers', ['rows' => $publisher->inRandomOrder()->get()]);
		// Несколько записей по порядку
		//return view('publishers', ['rows' => $publisher->orderBy('publisher_name', 'asc')->take(10)->skip(0)->where('publisher_name', '=', 'qwe')->get()]);
	}

    // Просмотр записи
	public function view($id) {
		$publisher = new Publisher();
		return view('publisher_view', ['row' => $publisher->find($id)]);
	}

    // Правка записи
	public function edit($id) {
		$publisher = new Publisher();
		return view('publisher_edit', ['row' => $publisher->find($id)]);
	}

    // Сохранение правки
	public function update($id, PublisherRequest $row) {
		$publisher = Publisher::find($id);
		// null //$publisher->publisher_id = $row->input('publisher_id');
		$publisher->publisher_name = $row->input('publisher_name');
		$publisher->publisher_note = $row->input('publisher_note');
		$publisher->save();

		return redirect()->route('publisher-view', $id)->with('success', 'Правка Издателя сохранена');
	}

    // Удаление записи
	public function delete($id) {
		Publisher::find($id)->delete();

		return redirect()->route('publisher-listing')->with('success', 'Издатель был удалён');
	}
}
