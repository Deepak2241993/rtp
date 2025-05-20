<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    use HasFactory;
    protected $table = 'homesection';
    protected $fillable = ['image', 'heading', 'description', 'sub_heading', 'status'];
}
