<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;    
use App\Models\Series;
use App\Models\SeriesHasGenres;

class Genre extends Model implements Auditable
{
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name', 'definition'
    ];

    public function genre(){
        $this->belongsTo(SeriesHasGenres::class);
    }

}
