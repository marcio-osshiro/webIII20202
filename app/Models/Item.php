<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = "item";
    public $timestamps = false;

    public function produto() {
      return $this->belongsTo('App\Models\Produto');
    }

    public function valor_total() {
      return $this->valor_unitario * $this->qtde;
    }
}
