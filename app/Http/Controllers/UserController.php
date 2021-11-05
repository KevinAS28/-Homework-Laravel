<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index(){
        $batas = 5;
        $data_user = User::orderBy('id', 'desc')->paginate($batas);
        $row_count = count($data_user);
        $no = $batas * ($data_user->currentPage()-1);
        
        $harga_sum = 0;//DB::table('users')->sum('harga');
        $cari_kw = false;
        return view('user/user', compact('data_user', 'no', 'row_count', 'harga_sum', 'cari_kw'));
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_user = User::where('name', 'like', '%'.$cari.'%')->orwhere('email', 'like', '%'.$cari.'%')->paginate($batas);
        // $data_user = User::orderBy('id', 'desc')->paginate($batas);
        $row_count = count($data_user);
        $no = $batas * ($data_user->currentPage()-1);
        
        $harga_sum = 0; //DB::table('users')->sum('harga');
        $cari_kw = true;
        return view('user/user', compact('data_user', 'no', 'row_count', 'harga_sum', 'cari', 'cari_kw'));
    }


    public function create(){
        return view('user/tambah_user');
    }

    public function store(Request $request)
    {  
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'email' => 'required|string|max:30',
            'level' => 'required|string',
            'password' => 'required|String|max:30',],
            [
                'name.required' => 'Nama Isi dlu ya',
                'email.required' => 'E-mail Isi dlu ya',
                'level.required' => 'Level Isi dlu ya',
                'password.required' => 'Passsword Isi dlu ya'
            ]
        );

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level' => $request->input('level'),
            'password' => Hash::make($request -> input('password'))
        ]);

        $user->save();
        return redirect('user')->with('pesan', 'Data user berhasil disimpan');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('pesan', 'Data user berhasil dihapus');
    }

    public function edit($id)
    {
        
	    $user = DB::table('users')->where('id',$id)->get();
	    return view('user/edit_user',['user' => $user]);
    }

    public function update(Request $request)
    {
        
	    DB::table('users')->where('id',$request->id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level' => $request->input('level'),
            'password' => Hash::make($request -> input('password'))

	    ]); 
        
	    
	    return redirect('/user')->with('pesan', 'Data user berhasil diedit');
    }

}
