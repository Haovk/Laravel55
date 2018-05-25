<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewKeyIndexIntervalComparison extends Model
{
    protected $table='ViewKeyIndexIntervalComparison';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  总况 / 自然月指标分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','ChannelId','channel_name','RegisterCount','D1PlayGameCount','FirstPayUserCount',
        'PayUserCount','PayMoenySum','AvgPayMoeny','Pay_stl','FirstConsumeUserCount','ConsumeUserCount','ConsumeMoneySum',
        'AvgConsumeMoney','Consume_stl','D2LoginCount','TRegisterCount','TRegisterLoginCount',
    ];


}
