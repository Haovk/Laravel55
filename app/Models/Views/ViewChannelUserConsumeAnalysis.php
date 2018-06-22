<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewChannelUserConsumeAnalysis extends Model
{
    protected $table='ViewChannelUserConsumeAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  付费用户分析 / 各渠道消费分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','ChannelId','channel_name','D1PlayGameCount','FirstConsumeUserCount','FirstConsumeMoenySum','WeekFirstConsumeUserCount',
        'MonthFirstConsumeUserCount','WeekConsumeUserCount','WeekConsumeMoneySum',
        'MonthConsumeUserCount','MonthConsumeMoneySum','ConsumeUserCount','ConsumeMoneySum','D1_7PlayGameCount','D1_30PlayGameCount',
    ];


}
