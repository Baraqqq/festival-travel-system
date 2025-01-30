<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $festivals = Festival::take(2)->get();
        return view('welcome', compact('festivals'));
    }
}