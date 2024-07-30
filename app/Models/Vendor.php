<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    public function products() {
        return $this->hasmany(Product::class, 'vendor_code', 'vendor_code');
    }
}
