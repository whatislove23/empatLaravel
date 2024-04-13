<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home
{

    public function index()
    {
        return view("home");
    }
}
