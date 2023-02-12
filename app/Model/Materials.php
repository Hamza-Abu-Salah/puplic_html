<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Materials extends Model
{
    //
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function door()
    {
        return $this->belongsTo(Door::class,'door_by');
    }
}
