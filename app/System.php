<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $fillable = [
        'id', 'name', 'host', 'dbname', 'dbuser', 'dbuserpass', 'status'
    ];

    protected $hidden = ['id', 'dbuserpass'];
}
