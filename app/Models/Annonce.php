<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    public function getprice()
    {
        $price = $this->price / 100;

        return number_format($price, 2, ',', ' ').' €';
    }

}
