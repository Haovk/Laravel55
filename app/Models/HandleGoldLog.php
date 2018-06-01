<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HandleGoldLog extends Model
{
    protected $table='handlegold_log';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid','handletype','gold','createtime','status','completetime',
    ];

}
