<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;


class SlideController extends Controller
{

    public function index(Request $request)
    {
        return view('app.slide.index');
    }

    public function json()
    {
        $data = Slide::all();


        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('image', function($row){
                return '<img src="uploads/'.$row->images.'" width="500px" style="border-radius:8px;" >';
            })

            ->addColumn('action', function($row){
                $editUrl = url('slide/edit/'.$row->id);
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

            ->rawColumns(['action','image'])
            ->make(true);
    }


    public function create()
    {
        return view('app.slide.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'images' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $file = $request->file('images');
        $attachment = str_replace(' ','-',strtolower(trim($file->getClientOriginalName())));
        $file_name = time().rand(100,999)."-".$attachment;
        $file->move( 'uploads/', $file_name);

        $post = array('images' => $file_name);
        Slide::create($post);

        return redirect()->route('slide.index')->with('success','Created successfully.');
    }



    public function edit(Request $request, $id)
    {
        $data['slide'] = Slide::where('id', $id)->first();
        return view('app.slide.edit',$data);
    }


    public function update(Request $request, slide $id)
    {
        $validator = Validator::make($request->all(), [
            'images' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $file = $request->file('images');
        $attachment = str_replace(' ','-',strtolower(trim($file->getClientOriginalName())));
        $file_name = time().rand(100,999)."-".$attachment;
        $file->move( 'uploads/', $file_name);
        $post = array('images' => $file_name);
        Slide::where('id', $request->id)->update($post);

        return redirect()->route('slide.index')->with('success','Updated successfully.');
    }


    public function destroy($id)
    {
        $data = Slide::where('id', $id)->delete();
        return response()->json(array('status' => "true",'action'=> 'delete','message' => "Deleted successfully" , $data ));
    }
}
