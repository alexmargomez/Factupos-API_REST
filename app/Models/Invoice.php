<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    
    protected $table = 'Invoices';
    protected $fillable = [ 'sale_id', 'invoice_number'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastInvoice = static::orderBy('created_at', 'desc')->first();
            $lastInvoiceNumber = $lastInvoice ? intval(substr($lastInvoice->invoice_number, 9)) : 0;
            $newInvoiceNumber = $lastInvoiceNumber + 1;
            $date = date('Ymd'); // Fecha actual en formato YYYYMMDD
            $model->invoice_number = $date . '-' . str_pad($newInvoiceNumber, 6, '0', STR_PAD_LEFT);
        });


    }
}

