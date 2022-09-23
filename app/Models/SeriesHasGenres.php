<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Series;
use App\Models\Genre;

class SeriesHasGenres extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id', 'genre_id'
    ];

    public function series(){
        $this->hasOne(Series::class);
    }

    public function genre(){
        $this->hasMany(Genre::class);
    }
}
