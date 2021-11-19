<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentsArr extends Model
{
    //
    protected $fillable = ['arr_text1', 'arr_text2'];
    //Tell laravel to fetch text values and set them as arrays
    protected $casts = ['arr_text1' => 'array','arr_text2' => 'array'];
}
