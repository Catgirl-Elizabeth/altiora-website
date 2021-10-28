<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function staffs()
    {
        return $this->belongsToMany(Staff::class);
    }
}
