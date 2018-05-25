<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebConfig extends Model
{
    protected $table='WebConfig';
    protected $primaryKey = 'Id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Title','Content',
    ];

}
