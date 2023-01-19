<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    
    'name',
    'description',
    'price',
    'img',
    'slug',
    'id_category',
    'id_user'

    ];
    protected $table = 'products';

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }
}
