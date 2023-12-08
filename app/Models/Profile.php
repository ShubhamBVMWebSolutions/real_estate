<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','profile_pic','surname','contact','address_1','address_2','postcode','state','Area','education','country'];
    use HasFactory;
}
