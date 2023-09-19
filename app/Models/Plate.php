<?php

namespace App\Models;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plate extends Model
{
    use HasFactory;

    public $timestamps = false;

    //relazione uno a molti con la tabella restaurants
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')->withPivot('amount');
    }
}
