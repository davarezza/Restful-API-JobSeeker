<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;

    public function societies()
    {
        return $this->hasMany(Society::class, 'regional_id', 'id');
    }
}
