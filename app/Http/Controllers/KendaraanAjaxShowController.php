<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Kendaraan;
use App\User;
use Image;
use Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KendaraanAjaxShowController extends Controller
{   
    public function formlogin(){
        return view ('login_form');
    }

    public function getlogin(Request $request){
        $userdata = User::array(
                        'name','=', $request->user,
                        'password', '=', $request->pass 
                    );
        // // attempt to do the login
        if (Auth::attempt($userdata)) {

            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
            alert('sign IN');}

        // } else {        

        //     // validation not successful, send back to form 
        //     return Redirect::to('login');

        // }
    }

    public function index(Request $request){
        $datakendaraan = Kendaraan::paginate(4);
        if ($request->ajax()) {
            $datakendaraan=$this->data($request->search);
            return view('kendaraan_ajax_show.tabeldatakendaraan', compact('datakendaraan'))->render();
        }else{
            return view('kendaraan_ajax_show.index',compact('datakendaraan'));
        }
    }

    public function addItem(Request $req) {
        $validator = Validator::make($req->all(), [
            'jenis' => 'required|regex:/^[A-Za-z ]+$/',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'file' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg'
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

        //mengembalikan tampilan page dengan membawa data terbaru
        $hasil="";
        $datakendaraan = Kendaraan::paginate(4);
        $last = $datakendaraan->lastpage();
        $datakendaraan = Kendaraan::paginate(4,['*'],'page',$last);
        $hasil.= view('kendaraan_ajax_show.tabeldatakendaraan',compact('datakendaraan'));

        return Response($hasil);
    }

    public function editItem(Request $req) {
        $validator = Validator::make($req->all(), [
            'jenis' => 'required|regex:/^[A-Za-z ]+$/',
            'nama' => 'required',
            'harga' => 'required|numeric'
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
        
        $page = $req->page;
        $hasil="";
        $datakendaraan = Kendaraan::paginate(4,['*'],'page',$page);
        $hasil.= view('kendaraan_ajax_show.tabeldatakendaraan',compact('datakendaraan'));

        return Response($hasil);
    }

    public function deleteItem(Request $req) {
        $data = Kendaraan::find($req->id);
        $data->delete ();

        File::delete('images/' .$data->file);

        //mengembalikan tampilan page dengan membawa data terbaru
        $hasil="";
        $page = $req->page;
        $datakendaraan = Kendaraan::paginate(4,['*'],'page',$page);
        $hasil.= view('kendaraan_ajax_show.tabeldatakendaraan',compact('datakendaraan'));

        return Response($hasil);
    }
    public function data($search){
        return $datakendaraan=Kendaraan::where('jenis','LIKE','%'.$search.'%')
                              ->orWhere('nama', 'LIKE', '%' . $search . '%' )
                              ->orWhere('harga','LIKE', '%' . $search . '%' )
                              ->paginate(4);
    }
    public function getkendaraan_info_by_search(Request $req){
        if ($req->ajax()) {
            $datakendaraan=$this->data($req->search);
            if (count($datakendaraan)>0) {
                $search = array('search' => $req->search);
                $view=view('kendaraan_ajax_show.tabeldatakendaraan',compact('datakendaraan','search'))->render();
                return response($view);
            }else{
                $hasil="";
                $hasil.='<div class="panel panel-default" style="margin:17px 0 0 0;clear:both">'.
                            '<div class="table-responsive" >'.
                                '<table class="table table-striped">'.
                                    '<thead>'.
                                        '<tr style="font-weight:bold;color:#fff" align="left" bgcolor="#4F5561">'.
                                            '<td align="center" style="padding:15px 10px"> &nbsp </td>'.
                                            '<td style="padding:15px 10px">Jenis</td>'.
                                            '<td style="padding:15px 10px">Nama</td>'.
                                            '<td style="padding:15px 10px">Harga</td>'.
                                            '<td align="center" style="padding:15px 10px">Gambar</td>'.
                                            '<td style="padding:15px 10px" align="center">Aksi</td>'.
                                        '</tr>'.
                                    '</thead>'.
                                    '<tbody>'.
                                        '<tr><td colspan="6" style="padding:10px 20px">Tidak ditemukan data <b>'.$req->search.'</b>.</td>'.
                                        '</tr>'.
                                    '</tbody>'.
                                '</table>'.
                            '</div>'.
                        '</div>';
                return response($hasil);
            }
        }
    }
    public function getkendaraan_search_page(Request $req){
        if ($req->ajax()) {
            $datakendaraan=$this->data($req->search);
            return view('kendaraan_ajax_show.tabeldatakendaraan', compact('datakendaraan'))->render();
        }
    }
}
