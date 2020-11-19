<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = "categoria";
    public $timestamps = false;

    function ultimasNoticias() {
      return Noticia::orderBy("data", "desc")
        ->where("categoria_id", $this->id)
        ->take(3)
        ->get();
    }
}
