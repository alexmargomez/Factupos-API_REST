<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $table = 'Services';
    protected $fillable = ['sale_id', 'date', 'price', 'customer_id', 'vehicle_id'];
}
