<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuComment extends Model
{
    use HasFactory;
    protected $table = 'buku_comment';
    protected $fillable= ['buku_id', 'comment', 'user_id'];
    

}
