<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewUserPayConsumeBalanceAnalysis extends Model
{
    protected $table='ViewUserPayConsumeBalanceAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  付费用户分析 / 充值消费平衡表
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','PayUserCount','PayMoenySum','ConsumeUserCount','ConsumeMoneySum','GoldUserCount','GoldUserSum',
    ];


}
