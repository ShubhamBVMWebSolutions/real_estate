<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','agent_id','product_price','product_discription','no_of_bedrooms','no_of_bathrooms','area','product_image','property_for'];
}
