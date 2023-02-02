<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class part_three_table_coache extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = false;  
}
