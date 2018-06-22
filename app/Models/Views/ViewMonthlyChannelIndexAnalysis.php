<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewMonthlyChannelIndexAnalysis extends Model
{
    protected $table='ViewMonthlyChannelIndexAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  总况 / 自然月指标分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','ChannelId','channel_name','D1PlayGameCount','RegisterCount','FirstPayUserCount',
        'PayUserCount','PayMoenySum','FirstConsumeUserCount','ConsumeUserCount','ConsumeMoneySum', 
    ];


}
