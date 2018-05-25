<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewMonthlyIndexAnalysis extends Model
{
    protected $table='ViewMonthlyIndexAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  总况 / 自然月指标分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','RegisterCount','D1PlayGameCount','FirstPayUserCount',
        'PayUserCount','PayMoenySum','FirstConsumeUserCount','ConsumeUserCount','ConsumeMoneySum',
    ];


}
