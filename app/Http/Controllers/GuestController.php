<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\Tentangpmr;
class GuestController extends Controller
{
    public function index()
    {
        $tutorial = Tutorial::first();
        $tentangpmr = Tentangpmr::all();
        return view('pages.guest.guest', compact('tutorial', 'tentangpmr'));
    }
}
