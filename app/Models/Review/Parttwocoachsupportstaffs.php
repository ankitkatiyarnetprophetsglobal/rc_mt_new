<?php

namespace App\Models\Review;

use App\Models\Masters\Miscmaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parttwocoachsupportstaffs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'coach_support_staff_year',
        'coach_support_staff_name_designation',
        'coach_support_staff_period_tour',
        'coach_support_staff_remarks',
        'status',
        'remarks'];

}
