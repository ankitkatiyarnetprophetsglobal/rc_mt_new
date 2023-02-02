<?php

namespace App\Models\Review;

use App\Models\Masters\Miscmaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parttwoathletes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'athletes_year',
        'athletes_discipline',
        'athletes_no_athletes_participated',
        'athletes_no_expenditure_incurred',
        'athletes_no_achievements',
        'athletes_no_remarks',
        'status',
        'remarks'];

}
