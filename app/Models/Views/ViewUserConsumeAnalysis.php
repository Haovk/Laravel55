<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewUserConsumeAnalysis extends Model
{
    protected $table='ViewUserConsumeAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  付费用户分析 / 用户消费分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','D1PlayGameCount','FirstConsumeUserCount','FirstConsumeMoenySum','WeekFirstConsumeUserCount',
        'MonthFirstConsumeUserCount','WeekConsumeUserCount','WeekConsumeMoneySum',
        'MonthConsumeUserCount','MonthConsumeMoneySum','ConsumeUserCount','ConsumeMoneySum','D1_7PlayGameCount','D1_30PlayGameCount',
    ];


}
