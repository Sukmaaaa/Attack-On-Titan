<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\SeriesHasGenres;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover', 'trailer', 'title', 'genre' , 'article',  'countryOfOrigin', 'originalRelease'
    ];  

    public function series(){
        $this->belongsTo(SeriesHasGenres::class);
        $this->belongsTo(seriesHasEpisode::class);
    }

}
