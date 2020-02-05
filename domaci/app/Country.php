<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'name',
        'alpha2',
        'alpha3',
    ];

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
