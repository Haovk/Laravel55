<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewUserBalanceAnalysis extends Model
{
    protected $table='ViewUserBalanceAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  付费用户分析 / 用户余额分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','D1PlayGameCount','GoldUserCount','GoldUserSum',
    ];


}
