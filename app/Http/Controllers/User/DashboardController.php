<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $alat = Alat::latest()->take(4)->get();

    return view('users.beranda', compact('alat'));
}

}
