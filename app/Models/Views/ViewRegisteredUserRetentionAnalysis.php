<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewRegisteredUserRetentionAnalysis extends Model
{
    protected $table='ViewRegisteredUserRetentionAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  注册用户分析 / 注册用户留存分析
     * @var array
     */
    protected $fillable = [
        'ObservationDate','RegisterCount','D2LoginCount','D3LoginCount','D4LoginCount',
        'D5LoginCount','D6LoginCount','D7LoginCount',
    ];


}
