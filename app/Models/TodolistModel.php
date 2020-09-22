<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class TodolistModel extends Model
{
    protected $table='tasks';
    protected $fillable = ['completed'];

}
