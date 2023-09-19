<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPlate extends Model
{
    protected $table = 'orders_plates';

    protected $fillable = [
        'orders_id',
        'plates_id',
        'amount'
    ];
}
