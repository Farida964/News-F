<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

class HomeController extends Controller
{
    public function index()
    {
        $allAgenda = Agenda::latest()->take(3)->get(); 
        return view('home', compact('allAgenda'));
    }
}
