<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;
    protected $table = 'homesliders';
    protected $fillable = ['image', 'title', 'description', 'button1_text', 'button1_url', 'button2_text', 'button2_url', 'order'];
}
