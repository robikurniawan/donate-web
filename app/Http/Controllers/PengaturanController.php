<?php

namespace App\Http\Controllers;

use App\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengaturanController extends Controller
{
    public function index(Request $request)
    {
        $id = '1';
        $data['setting'] = Pengaturan::where('id', $id)->first();
        return view('app.pengaturan.index',$data);
    }


    public function edit(Request $request)
    {
        $id = '1';
        $data['setting'] = Pengaturan::where('id', $id)->first();
        return view('app.pengaturan.edit',$data);
    }


    public function update(Request $request)
    {
        $id = '1';
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'norek' => 'required',
            'bank' => 'required',
            'an_bank' => 'required',
            
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $file = $request->file('logo');

        if($file != ""){
            $attachment = str_replace(' ','-',strtolower(trim($file->getClientOriginalName())));
            $file_name = time().rand(100,999)."-".$attachment;
            $file->move( 'uploads/', $file_name);
            $post = array(
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
                'logo' => $file_name,
                'norek' => $request->norek,
                'bank' => $request->bank,
                'an_bank' => $request->an_bank,

            );
    
        }else{
            $post = array(
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
                'norek' => $request->norek,
                'bank' => $request->bank,
                'an_bank' => $request->an_bank,
            );
           
        }

        Pengaturan::where('id', $id)->update($post);

        return redirect()->route('setting.index')->with('success','Updated successfully.');
    }



}
