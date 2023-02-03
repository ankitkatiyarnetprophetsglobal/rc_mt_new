<?php

namespace App\Models\Review;

use App\Models\Masters\Miscmaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sportsciencestaffdoctors extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'ssd_designation',
        'ssd_2018_19',
        'ssd_2019_20',
        'ssd_2020_21',
        'ssd_2021_22',
        'ssd_2022_23',        
        'status',
        'remarks'
    ];

}
