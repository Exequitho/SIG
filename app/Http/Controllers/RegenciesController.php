<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;

class RegenciesController extends Controller
{
    public function index()
    {
        $list_kabkota = Kabkota::all();
        return view('regencies.index', ['list_kabkota' => $list_kabkota]);
    }
}
