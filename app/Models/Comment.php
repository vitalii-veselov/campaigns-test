<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['id_campaign_from', 'id_campaign_to', 'text'];

    public function campaignFrom()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function campaignTo()
    {
        return $this->belongsTo(Campaign::class);
    }
}
