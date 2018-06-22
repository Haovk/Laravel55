<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewChannelUserPayConsumeBalanceAnalysis extends Model
{
    protected $table='ViewChannelUserPayConsumeBalanceAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  付费用户分析 / 各渠道付费平衡表
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','ChannelId','channel_name','PayUserCount','PayMoenySum',
        'ConsumeUserCount','ConsumeMoneySum','GoldUserCount','GoldUserSum',
    ];


}
