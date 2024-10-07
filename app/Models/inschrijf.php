<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inschrijf extends Model
{
    use HasFactory;

    protected $table = 'inschrijf';
 
    
    public function inschrijf()
    {
        return $this->belongsTo(inschrijf::class, 'activiteit_id', 'user_id');
    }
}