<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customeradress extends Model
{
    use HasFactory;

    protected $table = 'customeradderesses';

    protected $fillable = [
      'customer_id', 'address'  
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
