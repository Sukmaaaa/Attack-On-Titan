<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email'
    ];
}
