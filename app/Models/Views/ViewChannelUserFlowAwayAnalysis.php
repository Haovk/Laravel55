<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewChannelUserFlowAwayAnalysis extends Model
{
    protected $table='ViewChannelUserFlowAwayAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  注册用户分析 / 各渠道注册用户流失分析
     * @var array
     */
    protected $fillable = [
        'ObservationDate','ChannelId','channel_name','RegisterCount','D2_7LoginDie','D3_7LoginDie','D4_7LoginDie',
        'D5_7LoginDie','D6_7LoginDie','D7_7LoginDie',
    ];


}
