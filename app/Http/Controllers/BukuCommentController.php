<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\BukuComment;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class BukuCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postComment(Request $request){
        $user_id = $request->user_id;
        $buku_id = $request->buku_id;
        $comment = $request->comment;

        // $buku = Buku::find($buku_id);
        // $user = User::find($user_id);

        $buku_comment = new BukuComment([
            'buku_id' => $buku_id,
            'user_id' => $user_id,
            'comment' => $comment

        ]);

        $buku_comment->save();

        return Redirect::back();
    }

    public function getComment($buku_id){
        BukuComment::orderBy('updated_at');
        
    }

}
