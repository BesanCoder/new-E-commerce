<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'contact_person', 
        'type', 'payment_terms', 'status', 'notes'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
