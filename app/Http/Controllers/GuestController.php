<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
class GuestController extends Controller
{
    public function index()
    {
        $tutorial = Tutorial::first();
        return view('pages.guest.guest', compact('tutorial'));
    }
}
