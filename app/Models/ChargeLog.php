<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChargeLog extends Model
{
    protected $table='charge_log';
    protected $primaryKey = 'charge_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','charge_type','payments','gold','ip','provice','opera_date',
        'status_date','model','imsi','imei','channel','charge_status',
        'commodity_id','commodity_type','pv','visible','order_type',
    ];

}
