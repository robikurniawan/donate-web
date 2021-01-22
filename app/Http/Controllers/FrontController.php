<?php

namespace App\Http\Controllers;

use App\Aspirasi;
use App\Slide;
use App\Donatur;
use App\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class FrontController extends Controller
{
    //
    public function index()
    {
        $data['total'] = Donatur::sum('jumlah');
        $data['totalKeluar'] = Pengeluaran::sum('jumlah');

        $data['donaturs'] = Donatur::orderBy('id','DESC')->limit('20')->get();
        $data['keluars'] = Pengeluaran::orderBy('id','DESC')->limit('20')->get();
        $data['slides'] = Slide::orderBy('id','DESC')->get();
        return view('public.home',$data);
    }


    public function donatur()
    {
        return view('public.donatur');
    }


    public function disbursement()
    {
        return view('public.disbursement');
    }


    public function jsonDonatur()
    {
        $data = Donatur::all();


        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('jumlahDonasi', function($row){
                return "Rp.".number_format($row->jumlah);
            })

            ->addColumn('tanggalDonasi', function($row){
                return  tgl_indo($row->tgl_donasi);
            })

            ->rawColumns(['jumlahDonasi','tanggalDonasi'])
            ->make(true);
    }



    public function jsonDisbursement()
    {
        $data = Pengeluaran::all();


        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('jumlahKeluar', function($row){
                return "Rp.".number_format($row->jumlah);
            })

            ->addColumn('tanggalKeluar', function($row){
                return  tgl_indo($row->tanggal);
            })

            ->addColumn('lampiran', function ($row) {
                return '<a href="'.asset('uploads/'.$row->bukti.' ').' " target="_blank" class="btn btn-outline-primary">Lampiran</a>';
            })


            ->rawColumns(['jumlahKeluar','tanggalKeluar','lampiran'])
            ->make(true);
    }





    public function info()
    {
        return view('public.info');
    }

    public function berita()
    {
        return view('public.berita');
    }

    public function role()
    {
        return view('public.role');
    }


    public function sendMail()
    {
        $details = [
            'name'=> "Fajriadi",
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        Mail::to('robikurniawan.it@gmail.com')
            ->send(new \App\Mail\MailtrapAspirasi($details)
            );

        dd("Email is Sent.");

    }

}
