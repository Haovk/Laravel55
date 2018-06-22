<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewChannelUserRetentionAnalysis extends Model
{
    protected $table='ViewChannelUserRetentionAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  注册用户分析 / 各渠道注册用户留存分析
     * @var array
     */
    protected $fillable = [
        'ObservationDate','ChannelId','channel_name','RegisterCount','D2LoginCount','D3LoginCount','D4LoginCount',
        'D5LoginCount','D6LoginCount','D7LoginCount',
    ];


}
