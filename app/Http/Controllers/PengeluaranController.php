<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PengeluaranController extends Controller
{

    public function index(Request $request)
    {
        return view('app.pengeluaran.index');
    }

    public function json()
    {
        $data = Pengeluaran::all();


        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('jumlahKeluar', function ($row) {
                return "Rp." . number_format($row->jumlah);
            })
            ->addColumn('tanggalKeluar', function ($row) {
                return tgl_indo($row->tanggal);
            })
            ->addColumn('lampiran', function ($row) {
                return '<a href="'.asset('uploads/'.$row->bukti.' ').' " target="_blank" class="btn btn-outline-primary">Lampiran</a>';
            })
            ->addColumn('action', function ($row) {
                $editUrl = url('pengeluaran/edit/' . $row->id);
                return '
                <div class=" dropdown">
                    <a href="#" class="mailbox-toolbar-link" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                    <div class="dropdown-menu ml-n1">
                        <a href="' . $editUrl . '"  class="dropdown-item"><i class="uil-edit-alt"></i>   Edit</a>
                        <a href="#"  data-id="' . $row->id . '" class="delete dropdown-item text-danger"> <i class="uil-trash"></i>  Hapus</a>
                    </div>
                </div>
                ';
            })
            ->rawColumns(['action', 'jumlahDonasi', 'tanggalDonasi','lampiran'])
            ->make(TRUE);
    }

    public function create()
    {
        return view('app.pengeluaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);


        $file = $request->file('images');

        if ($file != "") {
            $attachment = str_replace(' ', '-', strtolower(trim($file->getClientOriginalName())));
            $file_name = time() . rand(100, 999) . "-" . $attachment;
            $file->move('uploads/', $file_name);

            $post = [
                'item' => $request->item,
                'jumlah' => str_replace('.', '', $request->jumlah),
                'tanggal' => $request->tanggal,
                'bukti' => $file_name
            ];


        } else {
            $post = [
                'item' => $request->item,
                'jumlah' => str_replace('.', '', $request->jumlah),
                'tanggal' => $request->tanggal,
            ];
        }


        Pengeluaran::create($post);
        return redirect()->route('pengeluaran.index')->with('success', 'Created successfully.');

    }


    public function totalDonasi()
    {
        return "Rp. " . number_format(Pengeluaran::sum('jumlah'));
    }


    public function edit(Request $request, $id)
    {
        $data['pengeluaran'] = Pengeluaran::where('id', $id)->first();
        return view('app.pengeluaran.edit', $data);
    }


    public function update(Request $request, pengeluaran $id)
    {
        request()->validate([
            'item' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);

        $file = $request->file('images');

        if ($file != "") {
            $attachment = str_replace(' ', '-', strtolower(trim($file->getClientOriginalName())));
            $file_name = time() . rand(100, 999) . "-" . $attachment;
            $file->move('uploads/', $file_name);

            $post = [
                'item' => $request->item,
                'jumlah' => str_replace('.', '', $request->jumlah),
                'tanggal' => $request->tanggal,
                'bukti' => $file_name
            ];

        } else {

            $post = [
                'item' => $request->item,
                'jumlah' => str_replace('.', '', $request->jumlah),
                'tanggal' => $request->tanggal,
            ];

        }


        Pengeluaran::where('id', $request->id)->update($post);

        return redirect()->route('pengeluaran.index')->with('success', 'Updated successfully.');
    }


    public function destroy($id)
    {
        $data = Pengeluaran::where('id', $id)->delete();
        return response()->json(array('status' => "true", 'action' => 'delete', 'message' => "Deleted successfully", $data));
    }
}
