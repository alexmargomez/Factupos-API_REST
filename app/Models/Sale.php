<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;
    
    protected $table = 'Sales';
    protected $fillable = [ 'customer_id','vehicle_id','total','payment_method'];
    

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    // Definir la relación con Services
    public function services()
    {
        return $this->hasMany(Service::class);
    }

}
