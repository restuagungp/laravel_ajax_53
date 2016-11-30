<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Kendaraan;
use Image;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KendaraanAjaxModalController extends Controller
{
    public function index(Request $request){
        $datakendaraan = Kendaraan::paginate(4);
        if ($request->ajax()) {
            return view('kendaraan_ajax_modal/tabeldatakendaraan', compact('datakendaraan'));
        }
        return view('kendaraan_ajax_modal.index',compact('datakendaraan'));
    }

    public function search(Request $req){
        if ($req->ajax()) {
            $hasil="";
            $kend = Kendaraan::where('jenis','LIKE','%'.$req->search.'%')
                                -> orWhere('nama','LIKE','%'.$req->search.'%')
                                -> orWhere('harga','LIKE','%'.$req->search.'%')->paginate(4);
            if ($kend) {
                foreach ($kend as $key => $kendaraan) {
                    $hasil.=
                            '<tr>'.
                                '<td></td>'.
                                '<td>'.$kendaraan->jenis.'</td>'.
                                '<td>'.$kendaraan->nama.'</td>'.
                                '<td>Rp '.$kendaraan->harga.'</td>'.
                                '<td><img width="100px" src="images/'.$kendaraan->file.'" alt="not found"></td>'.
                                '<td align="center">'.
                                    '<button style="padding:3px 8px" class="ubah btn btn-warning"  data-id="'.$kendaraan->id.'" data-jenis="'.$kendaraan->jenis.'" data-nama="'.$kendaraan->nama.'" data-harga="'.$kendaraan->harga.'" data-file="'.$kendaraan->file.'"><span class="glyphicon glyphicon-edit"></span> &nbsp Ubah</button> &nbsp'. 
                                    '<button style="padding:3px 8px" class="delete-modal btn btn-danger" data-id="'.$kendaraan->id.'" data-nama="'.$kendaraan->nama.'"><span class="glyphicon glyphicon-trash"></span> &nbsp Hapus</button>'.
                                '</td>'.
                            '</tr>';
                }
                return Response($hasil);
            }else{
                return response()->json ( $hasil);
            }
        }
    }

    public function addItem(Request $req) {
        $validator = Validator::make($req->all(), [
            'jenis' => 'required|regex:/^[A-Za-z ]+$/',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'file' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg'
        ],[   
            'jenis.regex' => 'Isi dengan karakter (string)',
            'harga.numeric' => 'Isi dengan angka (numeric)',
            'file.image' => ''
        ]);
        if ($validator->fails())
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );

        $asli = $req->file('file')->getClientOriginalName();
        $extension = $req->file('file')->getClientOriginalExtension();
        $image =uniqid().'-'.time().'-'.$asli;
        
        $dir = 'images/';
        $req->file('file')->move($dir, $image);


        $data = new Kendaraan();
        $data->jenis = $req->jenis;
        $data->nama = $req->nama;
        $data->harga = $req->harga;
        $data->file = $image;
        $data->save ();
        return response ()->json ( $data );
    }
    public function editItem(Request $req) {
        $validator = Validator::make($req->all(), [
            'jenis' => 'required|regex:/^[A-Za-z ]+$/',
            'nama' => 'required|regex:/^[A-Za-z1-9 ]+$/',
            'harga' => 'required|numeric'
        ],[   
            'jenis.regex' => 'Isi dengan karakter (string)',
            'nama.regex' => 'Isi dengan karakter/angka ',
            'harga.numeric' => 'Isi dengan angka (numeric)'
        ]);
        if ($validator->fails())
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );

        $data = Kendaraan::findOrFail($req->id);
        $data->jenis = $req->jenis;
        $data->nama = $req->nama;
        $data->harga = $req->harga;
        
        if ($req->file('file')=="") {                                          
            $data->file = $data->file;
        }else{  
            $asli = $req->file('file')->getClientOriginalName();
            $extension = $req->file('file')->getClientOriginalExtension();
            $image =uniqid().'-'.time().'-'.$asli; 

            $dir = 'images/';
            $req->file('file')->move($dir, $image);

            File::delete('images/' .$data->file);

            $data->file = $image;
        }
        $data->update();
        return response ()->json ( $data );
    }
    public function deleteItem(Request $req) {
        $data = Kendaraan::find($req->id);
        $data->delete ();

        File::delete('images/' .$data->file);
        return response ()->json ($data);
    }
}
