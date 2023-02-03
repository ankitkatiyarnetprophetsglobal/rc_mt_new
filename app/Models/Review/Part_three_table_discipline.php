<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Part_three_table_discipline extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'part_three_table_discipline';
}
