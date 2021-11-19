<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//fix dari materi
use App\Models\Galeri;
use App\Models\Buku;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $batas = 4;
        $data_galeri = Galeri::orderBy('id', 'desc')->paginate($batas);
        
        $row_count = count($data_galeri);
        $no = $batas * ($data_galeri->currentPage()-1);
        
        $harga_sum = 0;//DB::table('galeris')->sum('harga');
        $cari_kw = false;
        
        return view('galeri/galeri', compact('data_galeri', 'no', 'row_count', 'harga_sum', 'cari_kw'));
    }

    public function create()
    {
        $buku = Buku::all();
        return view('galeri.create', compact('buku'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $galeri = new Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;
        $foto = $request->foto;
        $namafile = time() . '.' . $foto->getClientOriginalExtension();
        Image::make($foto)->resize(200, 150)->save('thumb/' . $namafile);
        $foto->move('images/', $namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect('/galeri')->with('pesan', 'Data Galeri Buku berhasil disimpan');
    }


    public function destroy($id){
        $galeri = Galeri::find($id);
        $galeri->delete();
        return redirect('/galeri')->with('pesan', 'Data galeri berhasil dihapus');
    }

    public function edit($id)
    {
        
	    $galeri = DB::table('galeri')->where('id',$id)->get();
        $buku = Buku::all();
	    return view('galeri/edit_galeri',['galeri' => $galeri[0], 'buku'=> $buku]);
    }

    public function update(Request $request)
    {
        
        $foto = $request->foto;
        $namafile = time() . '.' . $foto->getClientOriginalExtension();
        Image::make($foto)->resize(200, 150)->save('thumb/' . $namafile);
        $foto->move('images/', $namafile);

	    DB::table('galeri')->where('id',$request->id)->update([
            'nama_galeri' => $request->nama_galeri,
            'keterangan' => $request->keterangan,
            'id_buku' => $request->id_buku,
            'foto' => $namafile

	    ]); 
        
	    return redirect('/galeri')->with('pesan', 'Data galeri berhasil diedit');
    }
}
