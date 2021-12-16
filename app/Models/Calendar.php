<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'schedules';

    static $rules = [
        'id' => 'reuired',
        'time_start' => 'required',
        'time_end' => 'required',
        'day' => 'required',
        'id_class' => 'required',
    ];
}
