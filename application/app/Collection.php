<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use Traits\Uuids;

    protected $fillable = ['owner', 'data', 'title', 'description'];

    public function records()
    {
        return $this->hasMany('App\Record', '');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'owner');
    }

}
