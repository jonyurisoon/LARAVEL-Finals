<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    public $table = "student";

    public $fillable = ["id","name","grade"];

    public $timestamps = false;
}
