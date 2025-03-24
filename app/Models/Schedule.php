<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'Schedules';
    protected $fillable = [
        'servicios',
        'customer_id',
        'vehicle_id',
        'state',
        'worker_id',
    ];

    protected $casts = [
        'servicios' => 'array',
    ];

    public function worker()
    {
        return $this->hasOne(Worker::class);
    }
}
