<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewChannelUserBalanceAnalysis extends Model
{
    protected $table='ViewChannelUserBalanceAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  付费用户分析 / 各渠道余额分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','ChannelId','channel_name','D1PlayGameCount','GoldUserCount','GoldUserSum',
    ];


}
