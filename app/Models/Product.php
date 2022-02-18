<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public $with = [
        'tags'
    ];

    public function tags() {
        return $this->hasMany(ProductTag::class);
    }
}
