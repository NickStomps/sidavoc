<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activiteit extends Model
{
    use HasFactory;

    protected $table = 'activiteit';

    protected $fillable = [
        'naam_activiteit',
        'Details_activiteit',
        'Begin_activiteit',
        'Eind_activiteit',
        'Locatie_activiteit',
        'eten_inclusief',
        'Kosten',
        'maximaal_deelnemers',
        'image_path',
    ];
}