<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewChannelUserActivityAnalysis extends Model
{
    protected $table='ViewChannelUserActivityAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  活跃用户分析 / 各渠道用户活跃分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','ChannelId','channel_name','D1FirstloginCount','D1_7FirstloginCount','D1_30FirstloginCount',
        'D1PlayGameCount','D1_7PlayGameCount','D1_30PlayGameCount','WeekLoginDie','WeekLoginLife',
        'MonthLoginDie','MonthLoginLife',
    ];


}
