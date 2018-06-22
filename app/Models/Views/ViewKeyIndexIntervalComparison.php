<?php

namespace App\Models\Views;

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
        'PayUserCount','PayMoenySum','FirstConsumeUserCount','ConsumeUserCount','ConsumeMoneySum',
        'AvgConsumeMoney','D2LoginCount','TRegisterCount','TRegisterLoginCount','D1_7_in_7_PlayGameCount',
    ];


}
