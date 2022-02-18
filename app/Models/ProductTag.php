<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;

    public $table = 'product_tag';

    protected $fillable = [
        'product_id',
        'tag_id'
    ];

    protected $hidden = [
        'product_id',
        'tag_id'
    ];

    public $with = [
        'tag'
    ];

    public $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function tag() {
        return $this->hasOne(Tag::class, 'id', 'tag_id');
    }
}
