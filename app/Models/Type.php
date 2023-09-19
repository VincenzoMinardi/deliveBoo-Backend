<?php

namespace App\Models;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function restaurants()
    {

        return $this->belongsToMany(Restaurant::class);
    }
}
