<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;

class PetaController extends Controller
{
    public function index() {
        $list_provinsi = Provinsi::all();
        return view('peta.index', ['list_provinsi' => $list_provinsi]);
    }
}
