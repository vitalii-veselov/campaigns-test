<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'id_campaign',
        'id_position',
        'salary',
        'first_name',
        'last_name',
        'date_birth',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
