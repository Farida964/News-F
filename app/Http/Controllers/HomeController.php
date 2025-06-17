<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

class HomeController extends Controller
{
    public function index()
    {
        $agendas = Agenda::latest()->take(3)->get(); // Ambil 3 agenda terbaru
        return view('home', compact('agendas'));
    }
}
