<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request) : string
    {
        $request->validate([
            'uploadFile' => 'required|file|mimes:jpeg,png,jpg'
        ]);

        if ($request->hasFile('uploadFile')) {
            $picture = $request->file('uploadFile');
            $name = $picture->getClientOriginalName();
            $picture->storePubliclyAs('picture',$name,'local');


            return  redirect()->route('file.upload')->with('message',"Berhasil di simpan : $name");
        }else{
            return redirect()->route('file.upload')->with('message','Gagal upload file');

        }

    }

    public function uploadView() : string
    {

        return view('upload.index');

    }
}
