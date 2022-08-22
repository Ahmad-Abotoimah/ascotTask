<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
     protected $guarded = [];
     public function variation_options(): HasOne
    {
        return $this->hasOne(VariationsOptions::class);
    }
}
