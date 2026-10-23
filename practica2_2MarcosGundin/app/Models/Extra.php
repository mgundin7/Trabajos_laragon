<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    /** @use HasFactory<\Database\Factories\ExtraFactory> */
    use HasFactory;

    protected $table = 'extras';
    protected $primaryKey = 'id_extra';
    protected $fillable = ['nombre', 'precio'];
}
