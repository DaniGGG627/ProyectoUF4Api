<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['first_name', 'last_name', 'module_id'];

    public function module(){
    return $this->belongsTo(Module::class);
}


}
