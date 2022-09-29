<?php

namespace App\Models;

use App\models\anime;
use App\models\Series;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animeHasSeries extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_id', 'series_id'
    ];

    public function anime(){
        $this->hasOne(anime::class);
    }

    public function series(){
        $this->hasMany(Series::class);
    }
}
