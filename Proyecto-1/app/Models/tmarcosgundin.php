<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tmarcosgundin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'dni';
    protected $keyType = 'string';
}
