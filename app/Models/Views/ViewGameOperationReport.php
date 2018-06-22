<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewGameOperationReport extends Model
{
    protected $table='ViewGameOperationReport';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  总况 / 游戏运营报告
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','RegisterCount','D2LoginCount','D1PlayGameCount',
        'PayUserCount','ConsumeUserCount','PayMoenySum','ConsumeMoneySum','D2_7LoginDie','D4_7LoginDie',
    ];


}
