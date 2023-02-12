<?php

namespace App\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Door extends Model
{
    //
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function bag()
    {
        return $this->belongsTo(Laws::class,'laws_id');
    }
}
