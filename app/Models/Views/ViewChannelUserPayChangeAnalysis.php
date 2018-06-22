<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewChannelUserPayChangeAnalysis extends Model
{
    protected $table='ViewChannelUserPayChangeAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  注册用户分析 / 各渠道注册用户充值转换分析
     * @var array
     */
    protected $fillable = [
        'ObservationDate','ChannelId','channel_name','RegisterCount','D1_7_in_1_PayCount','D1_7_in_2_PayCount','D1_7_in_3_PayCount',
        'D1_7_in_4_PayCount','D1_7_in_5_PayCount','D1_7_in_6_PayCount','D1_7_in_7_PayCount','D1_7_in_1_PayMoneySum',
        'D1_7_in_2_PayMoneySum','D1_7_in_3_PayMoneySum','D1_7_in_4_PayMoneySum','D1_7_in_5_PayMoneySum','D1_7_in_6_PayMoneySum',
        'D1_7_in_7_PayMoneySum',
    ];


}
