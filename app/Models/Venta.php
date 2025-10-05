<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto',
        'categoria',
        'cantidad',
        'precio_unitario',
        'total',
        'fecha_venta',
        'vendedor',
    ];

    protected $casts = [
        'fecha_venta' => 'date',
        'precio_unitario' => 'decimal:2',
        'total' => 'decimal:2',
    ];
}
