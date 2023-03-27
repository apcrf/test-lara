<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiskController extends Controller
{
    // Диски - Список записей
    public function disks()
    {
        return view('disks');
    }
}
