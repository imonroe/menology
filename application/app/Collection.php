<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use \App\Record;
use \App\User;

class Collection extends Model
{
    use Uuid;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['owner', 'data', 'title', 'description'];

    public function records()
    {
        return $this->hasMany('App\Record', 'collection_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'owner');
    }

}
