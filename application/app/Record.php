<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use Traits\Uuids;

    protected $fillable = ['owner', 'data', 'metadata', 'collection_id'];

    public function collection ()
    {
        return $this->belongsTo('App\Collection', 'collection_id');
    }
}
