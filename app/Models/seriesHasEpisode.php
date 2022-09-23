<?php

namespace App\Models;

use App\Models\Series;
use App\Models\episode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seriesHasEpisode extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id', 'episode_id'
    ];

    public function series(){
        $this->hasOne(Series::class);
    }

    public function episode(){
        $this->hasMany(episode::class);
    }
}
