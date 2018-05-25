<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewGameOperationReport extends Model
{
    protected $table='ViewGameOperationReport';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  总况 / 游戏运营报告
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','RegisterCount','D2LoginCount','D1PlayGameCount','D1_7LoginDieRatio',
        'D4_7LoginDieRatio','PayUserCount','ConsumeUserCount','PayMoenySum','ConsumeMoneySum','AvgPayMoeny','AvgConsumeMoney',
    ];


}
