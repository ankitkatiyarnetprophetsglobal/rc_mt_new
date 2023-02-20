<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class part_three_dis_discounted extends Model
{
    use HasFactory,SoftDeletes;
    // part_three_dis_discounteds
    protected $table = 'part_three_dis_discounted';
   
}
