<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    
    protected $table = 'suppliers';
    protected $fillable = ['supplier_name','address',
    'phonenumber','email'];
}
