<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewChannelRegisteredUserAnalysis extends Model
{
    protected $table='ViewChannelRegisteredUserAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  注册用户分析 / 各渠道注册注册用户
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','ChannelId','channel_name','D1FirstloginCount','D1_7FirstloginCount','D1_30FirstloginCount','AllFirstloginCount',
    ];


}
