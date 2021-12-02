<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable= ['judul', 'penulis', 'harga', 'tgl_terbit', 'love', 'foto', 'buku_seo'];
    protected $dates = ['tgl_terbit'];


}
