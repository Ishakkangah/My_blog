<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class praktikum extends Model
{
    
    protected $fillable = ['nim', 'name', 'nilai_akhir', 'nilai_huruf', 'status'];
}
