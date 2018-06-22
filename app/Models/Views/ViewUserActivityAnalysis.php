<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewUserActivityAnalysis extends Model
{
    protected $table='ViewUserActivityAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  活跃用户分析 / 用户活跃分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','D1FirstloginCount','D1_7FirstloginCount','D1_30FirstloginCount',
        'D1PlayGameCount','D1_7PlayGameCount','D1_30PlayGameCount','WeekLoginDie','WeekLoginLife',
        'MonthLoginDie','MonthLoginLife',
    ];


}
