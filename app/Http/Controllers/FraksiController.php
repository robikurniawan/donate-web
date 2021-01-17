<?php

namespace App\Http\Controllers;

use App\Fraksi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FraksiController extends Controller
{

    public function index(Request $request)
    {
        return view('app.fraksi.index');
    }

    public function json()
    {
        $data = Fraksi::all();


        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('action', function($row){
                $editUrl = url('fraksi/edit/'.$row->id);
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

            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('app.fraksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Fraksi::create($request->all());
        return redirect()->route('fraksi.index')->with('success','Created successfully.');
    }



    public function edit(Request $request, $id)
    {
        $data['fraksi'] = Fraksi::where('id', $id)->first();
        return view('app.fraksi.edit',$data);
    }


    public function update(Request $request, fraksi $id)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        Fraksi::where('id', $request->id)->update($data);

        return redirect()->route('fraksi.index')->with('success','Updated successfully.');
    }


    public function destroy($id)
    {
        $data = Fraksi::where('id', $id)->delete();
        return response()->json(array('status' => "true",'action'=> 'delete','message' => "Deleted successfully" , $data ));
    }
}
