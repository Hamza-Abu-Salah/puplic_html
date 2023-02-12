<?php

namespace App\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bages extends Model
{
    use SoftDeletes;
    //
    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function laws()
    {
        return $this->hasMany(Laws::class,'bages_id','id');
    }
}
