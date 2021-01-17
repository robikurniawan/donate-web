<?php

namespace App\Http\Controllers;

use App\Donatur;
use App\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['totalDonasi'] = Donatur::sum('jumlah');
        $data['totalKeluar'] = Pengeluaran::sum('jumlah');

        $data['donaturs'] = Donatur::orderBy('id','DESC')->limit('20')->get();
        return view('app.dashboard',$data);
    }
}
