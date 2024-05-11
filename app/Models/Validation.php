<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Validation extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'validations';

    protected $guarded = [];

    protected $primaryKey = "id";

    public $timestamps = false;

    public function JobCategory()
    {
        return $this->belongsTo(JobCategories::class, 'job_category_id', 'id');
    }
}
