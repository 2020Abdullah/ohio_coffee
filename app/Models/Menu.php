<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
        'desc',
        'price',
        'category_id',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
