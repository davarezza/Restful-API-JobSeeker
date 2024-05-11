<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobCategories extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'job_categories';

    protected $guarded = [];

    protected $primaryKey = "id";

    public $timestamps = false;

    public function validations()
    {
        return $this->hasMany(Validation::class, 'job_category_id', 'id');
    }
}
