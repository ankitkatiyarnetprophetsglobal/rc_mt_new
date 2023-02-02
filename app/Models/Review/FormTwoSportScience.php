<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormTwoSportScience extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'part_two_sport_science_equipments';
}
