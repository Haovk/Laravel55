<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewTotalUserPayment extends Model
{
    protected $table='ViewTotalUserPayment';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     * 总况 / 用户付费总况
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','PayUserCount','ConsumeUserCount','PayMoenySum','ConsumeMoneySum',
        'AvgPayMoeny','AvgConsumeMoney','Pay_stl','Consume_stl',
    ];


}
