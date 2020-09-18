<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Makanan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('adminhome', ['jumlah_makanan'=>count(Makanan::all())]);
    }
}
