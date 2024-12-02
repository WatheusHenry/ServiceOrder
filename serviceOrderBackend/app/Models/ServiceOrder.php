<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'open_date',
        'customer_name',
        'customer_cpf',
        'product_id',
        'customer_complaint',
        'technical_solution',
        'user_id',
        

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);  // Relacionamento com o Usuário
    }
}
