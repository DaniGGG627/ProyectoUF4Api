<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model

{
    protected $fillable = ['name', 'description'];
    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function teachers()
{
    return $this->hasMany(Teacher::class);
}

public function module()
{
    return $this->belongsTo(Module::class);
}

    
}
