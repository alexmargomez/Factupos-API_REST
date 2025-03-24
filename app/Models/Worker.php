<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Worker extends Model
{
    use HasFactory;

    protected $table = 'Workers';
    protected $fillable = ['name', 'totalDia'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
