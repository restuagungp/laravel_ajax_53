<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Kendaraan;
use Image;
use Illuminate\Support\Facades\File;

class KendaraanController extends Controller
{   
    public function index(Request $request){
        $datakendaraan = Kendaraan::paginate(4);
        if ($request->ajax()) {
            return view('kendaraan/tabeldatakendaraan', compact('datakendaraan'));
        }else{
            return view('kendaraan.index',compact('datakendaraan'));       // objek dikirim ke halaman index.php
        }
    }

    public function search(Request $request){
        $data = $request->vcari;
        $dtkend = Kendaraan::where('jenis','LIKE','%'.$data.'%')
                  ->orWhere ( 'nama', 'LIKE', '%' . $data . '%' )
                  ->orWhere ( 'harga', 'LIKE', '%' . $data . '%' )
                  ->get ();
        if(count($dtkend) > 0){
            return view('kendaraan.search_index')->withDetails($dtkend)->withQuery ( $data );
        }
        else{   
            return view ('kendaraan.search_index')->withMessage('No Details found. Try to search again !');
        }
    }

    public function create(){
    	return view('kendaraan.tambah_kendaraan');
    }

    public function store(Request $req){
        $this->validate($req, [         
            'jenis' => 'required|regex:/^[A-Za-z ]+$/',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50000',
        ]);
        $asli = $req->file('image')->getClientOriginalName();
        $imagename = uniqid().'-'.time().'-'.$asli;  // nama file gambar
        $image = $req->file('image');                                       // jika file gambar dingi diperbarui dengan input file baru
        
        // $destinationPath = public_path('/images_thumbnail');                // direktori penyimpanan file 1
        // $img = Image::make($image->getRealPath());
        // $img->resize(100, 100, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$imagename);                          // menyimpan file di direktori 1 setelah resize file

        $destinationPath = public_path('/images');                          // direktori penyimpanan file 2
        $image->move($destinationPath, $imagename);                         // menyimpan file di direktori 2 

        $kend = new Kendaraan();                                            //pembuatan objek model
        $kend->jenis = $req->jenis;                                         //objek->field_database = take->input_form
        $kend->nama = $req->nama;
        $kend->harga = $req->harga;
        $kend->file = $imagename;
        $kend->save();                                                      // simpan di database

        return redirect()->route('kendaraan.index')
            ->with('success','SUCCESS, data berhasil disimpan.');
    }

    public function edit($id){
        $kend = Kendaraan::findOrFail($id);
        return view('kendaraan/ubah_kendaraan', compact('kend'));
    }

    public function update(Request $get, $id){
        $this->validate($get, [
            'jenis' => 'required|regex:/^[A-Za-z ]+$/',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:50000',
        ]);

        $kend = Kendaraan::where('id',$id)->first();
        $kend->jenis = $get->jenis;
        $kend->nama = $get->nama;
        $kend->harga = $get->harga;
        
        if ($get->file('image')=="") {                                          // jika file gambar tidak ada input 'tidak ingin diperbarui'
            $kend->file = $kend->file;
        }else{  
            
            $image = $get->file('image');                                       // jika file gambar dingi diperbarui dengan input file baru
            $asli = $get->file('image')->getClientOriginalName();
            $imagename = uniqid().'-'.time().'-'.$asli;  // nama file gambar
            
            
            // $destinationPath = public_path('/images_thumbnail');                // direktori penyimpanan 1
            // $img = Image::make($image->getRealPath());
            // $img->resize(100, 100, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save($destinationPath.'/'.$imagename);                          // simpan di direktori setelah resize

            $destinationPath = public_path('/images');                          // direktori penyimpanan 2
            $image->move($destinationPath, $imagename);                         // simpan di direktori
            
            File::delete('images/' .$kend->file);                                
            //unlink('images_thumbnail/'.$kend->file);                            // delete file di direktori 2
            $kend->file = $imagename;
        }

        $kend->update();
        return redirect()->route('kendaraan.index')
            ->with('success','SUCCESS, data berhasil diperbarui.');
    }

    public function destroy($id){   
        $kend = Kendaraan::findOrFail($id);
        $kend->delete();

        File::delete('images/' .$kend->file);                                    
        //unlink('images_thumbnail/'.$kend->file);
        return redirect()->route('kendaraan.index')
            ->with('success','DELETED, Data berhasil dihapus.');
    }
}

