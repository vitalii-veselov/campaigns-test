<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';

    protected $fillable = ['title', 'description'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
