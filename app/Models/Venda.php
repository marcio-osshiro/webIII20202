<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
    protected $table = "venda";
    public $timestamps = false;
    protected $dates = [
            'data'
        ];


    public function itens() {
      return $this->hasMany('App\Models\Item');
    }
}
