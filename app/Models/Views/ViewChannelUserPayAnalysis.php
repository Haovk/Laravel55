<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewChannelUserPayAnalysis extends Model
{
    protected $table='ViewChannelUserPayAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  付费用户分析 / 各渠道充值分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','ChannelId','channel_name','D1PlayGameCount','FirstPayUserCount','FirstPayMoenySum','WeekFirstPayUserCount',
        'MonthFirstPayUserCount','WeekPayUserCount','WeekPayMoenySum',
        'MonthPayUserCount','MonthPayMoenySum','PayUserCount','PayMoenySum','D1_7PlayGameCount','D1_30PlayGameCount',
    ];


}
