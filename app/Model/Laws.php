<?php

namespace App\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laws extends Model
{
    //
    use SoftDeletes;

    public function bag()
    {
        return $this->belongsTo(Bages::class,'bages_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function dors()
    {
        return $this->hasMany(Door::class,'laws_id','id');
    }
}
