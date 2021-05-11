<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Collection;
use User;

class Record extends Model
{
    use Uuid;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['owner', 'data', 'metadata', 'collection_id'];

    public function collection ()
    {
        return $this->belongsTo('\App\Collection', 'collection_id');
    }

    public function setMetadataAttribute($value)
    {
        $this->attributes['metadata'] = json_encode($value);
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }
}
