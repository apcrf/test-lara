<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Класс модели
use App\Models\Disk;

// Класс для валидации
use App\Http\Requests\DiskRequest;

class DiskController extends Controller
{
    // Диски - Список записей
    public function disks()
    {
        return view('disks');
    }

    /*
    |--------------------------------------------------------------------------
    | REST API methods
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $perPage = request('per_page', 20); // `20` is the default if no `per_page` in the request
        $search = request('search', '');
        $json = Disk::select('disks.*', 'artist_name', 'publisher_name')
            ->leftJoin('artists', 'artist_id', '=', 'disk_artist_id')
            ->leftJoin('publishers', 'publisher_id', '=', 'disk_publisher_id')
            ->where('disk_name', 'LIKE', '%' . $search . '%')
            ->orderBy('disk_id', 'desc')
            ->paginate($perPage);
        return $json;
    }

    public function get($id)
    {
        $json = Disk::select('disks.*', 'artist_name', 'publisher_name')
            ->leftJoin('artists', 'artist_id', '=', 'disk_artist_id')
            ->leftJoin('publishers', 'publisher_id', '=', 'disk_publisher_id')
            ->find($id);
        return $json;
    }

    public function post(DiskRequest $request)
    {
        $row = Disk::create($request->all());
        $res = response()->json($row, 201);
        return $res;
    }

    public function put($id, DiskRequest $request)
    {
        $row = Disk::findOrFail($id);
        $row->update($request->all());
        $res = response()->json($row, 200);
        return $res;
    }

    public function delete($id)
    {
        $row = Disk::findOrFail($id);
        $row->delete();
        $res = response()->json(null, 204);
        return $res;
    }
}
