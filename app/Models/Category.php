<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category extends Model
{
    protected $fillable = ['name'];

    public function brands() {
        return $this->hasMany(Brand::class);
    }

    // Category has many Manuals through Brands
    public function manuals() {
        return $this->hasManyThrough(Manual::class, Brand::class);
    }
}

