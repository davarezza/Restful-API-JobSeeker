<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Validator extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'validators';

    protected $guarded = [];

    protected $primaryKey = "id";

    public $timestamps = false;
}
