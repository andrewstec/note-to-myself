<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'email', 'note', 'websites', 'image1', 'image2', 'image3', 'image4', 'tbd',
    ];
}
