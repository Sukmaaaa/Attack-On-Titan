<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class episode extends Model
{
    use HasFactory;

    protected $fillable = [
     'noInSeason','titleCard', 'title', 'directedBy', 'writenBy', 'originalAirDate', 'description'
    ];
}
