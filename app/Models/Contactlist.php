<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactlist extends Model
{
    protected $table='contactus';
    protected $sendtoemail = [
        'sendtoemail' => 'boolean'

    ];

}
