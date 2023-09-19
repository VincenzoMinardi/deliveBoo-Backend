<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function plates()
    {
        return $this->belongsToMany('App\Models\Plate')->withPivot('amount');
    }
}
