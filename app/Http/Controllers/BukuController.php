<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\BukuComment;
use Illuminate\Support\Facades\Redirect;


class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $batas = 5;
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $row_count = count($data_buku);
        $no = $batas * ($data_buku->currentPage()-1);
        
        $harga_sum = DB::table('buku')->sum('harga');
        $cari_kw = false;
        return view('w2/buku', compact('data_buku', 'no', 'row_count', 'harga_sum', 'cari_kw'));
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', '%'.$cari.'%')->orwhere('penulis', 'like', '%'.$cari.'%')->paginate($batas);
        // $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $row_count = count($data_buku);
        $no = $batas * ($data_buku->currentPage()-1);
        
        $harga_sum = DB::table('buku')->sum('harga');
        $cari_kw = true;
        return view('w2/buku', compact('data_buku', 'no', 'row_count', 'harga_sum', 'cari', 'cari_kw'));
    }


    public function create(){
        return view('w3/tambah_buku');
    }

    public function store(Request $request)
    {  
        $this->validate($request, [
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',],
            [
                'judul.required' => 'Judul Isi dlu ya',
                'penulis.required' => 'Penulis Isi dlu ya',
                'harga.required' => 'Harga Isi dlu ya',
                'tgl_terbit.required' => 'Tgl Isi dlu ya'
            ]
        );

        $buku = new Buku([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'harga' => $request->input('harga'),
            'tgl_terbit' => $request -> input('tgl_terbit')

        ]);

        $buku->save();
        return redirect('buku')->with('pesan', 'Data buku berhasil disimpan');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan', 'Data buku berhasil dihapus');
    }

    public function edit($id)
    {
        
	    $buku = DB::table('buku')->where('id',$id)->get();
	    return view('w3/edit_buku',['buku' => $buku]);
    }

    public function update(Request $request)
    {
        
	    DB::table('buku')->where('id',$request->id)->update([
		'judul' => $request->judul,
		'penulis' => $request->penulis,
		'harga' => $request->harga,
		'tgl_terbit' => $request->tgl_terbit

	    ]); 
	    
	    return redirect('/buku')->with('pesan', 'Data buku berhasil diedit');
    }

    public function photos(){
        return $this->hasMany('App\Models\Buku', 'id_buku', 'id');
    }

    public function gallery(){
        $all_buku = Buku::orderBy('id', 'desc')->paginate(3);
        return view('buku/buku_gallery', compact('all_buku'));
    }

    public function galbuku($title){
        $buku = Buku::where('buku_seo', $title)->first();
        $buku_id = (int)$buku->id;
        $comments = DB::table('buku_comment')->orderBy('updated_at', 'desc')->where('buku_id',$buku_id)->get();
        $user_comments = [];
        foreach ($comments as $com) {
            array_push($user_comments, ['comment'=>$com->comment, 'user'=>User::find($com->user_id)->name, 'updated'=>$com->updated_at]);
        }
        return view('buku/detail_buku', compact('buku', 'user_comments', 'buku_id', 'comments'));
    }

    public function loveBuku(Request $request, $id){
        $buku = Buku::find($id);
        $buku->love++;
        $buku->save();
        return Redirect::back();
        
    }
}
