<?php

namespace App\Http\Controllers;

use App\Donatur;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DonaturController extends Controller
{

    public function index(Request $request)
    {
        return view('app.donatur.index');
    }

    public function json()
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

            ->addColumn('action', function($row){
                $editUrl = url('donatur/edit/'.$row->id);
                return '
                <div class=" dropdown">
                    <a href="#" class="mailbox-toolbar-link" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                    <div class="dropdown-menu ml-n1">
                        <a href="'.$editUrl.'"  class="dropdown-item"><i class="uil-edit-alt"></i>   Edit</a>
                        <a href="#"  data-id="'.$row->id.'" class="delete dropdown-item text-danger"> <i class="uil-trash"></i>  Hapus</a>
                    </div>
                </div>
                ';
            })

            ->rawColumns(['action','jumlahDonasi','tanggalDonasi'])
            ->make(true);
    }

    public function create()
    {
        return view('app.donatur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_donatur' => 'required',
            'jumlah' => 'required',
            'tgl_donasi' => 'required',
        ]);

        $post = [
            'nama_donatur' => $request->nama_donatur,
            'jumlah' => str_replace('.','',$request->jumlah),
            'tgl_donasi' => $request->tgl_donasi,
        ];

        Donatur::create($post);
        $from = $request->from;
        if($from == "dashboard") {
            return redirect()->route('dashboard')->with('success','Created successfully.');

        }else{        
            return redirect()->route('donatur.index')->with('success','Created successfully.');
        }
    }


    public function totalDonasi()
    {
        return "Rp. ".number_format(Donatur::sum('jumlah'));
    }


    public function edit(Request $request, $id)
    {
        $data['donatur'] = Donatur::where('id', $id)->first();
        return view('app.donatur.edit',$data);
    }


    public function update(Request $request, donatur $id)
    {
        request()->validate([
            'nama_donatur' => 'required',
            'jumlah' => 'required',
            'tgl_donasi' => 'required',
        ]);

        $post = [
            'nama_donatur' => $request->nama_donatur,
            'jumlah' => str_replace('.','',$request->jumlah),
            'tgl_donasi' => $request->tgl_donasi,
        ];

        Donatur::where('id', $request->id)->update($post);

        return redirect()->route('donatur.index')->with('success','Updated successfully.');
    }


    public function destroy($id)
    {
        $data = Donatur::where('id', $id)->delete();
        return response()->json(array('status' => "true",'action'=> 'delete','message' => "Deleted successfully" , $data ));
    }
}
