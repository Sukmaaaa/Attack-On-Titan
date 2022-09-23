<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class episode extends Model implements Auditable
{
    use HasFactory;

    use \OwenIt\Auditing\Auditable;
    
    protected $fillable = [
     'series', 'noInSeason','titleCard', 'title', 'directedBy', 'writenBy', 'originalAirDate', 'description'
    ];

    public function episode(){
        $this->belongsTo(seriesHasEpisode::class);
    }
}
