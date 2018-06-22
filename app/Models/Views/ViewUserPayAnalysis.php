<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewUserPayAnalysis extends Model
{
    protected $table='ViewUserPayAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  付费用户分析 / 用户充值分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','D1PlayGameCount','FirstPayUserCount','FirstPayMoenySum','WeekFirstPayUserCount',
        'MonthFirstPayUserCount','WeekPayUserCount','WeekPayMoenySum',
        'MonthPayUserCount','MonthPayMoenySum','PayUserCount','PayMoenySum','D1_7PlayGameCount','D1_30PlayGameCount',
    ];


}
