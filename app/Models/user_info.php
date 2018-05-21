<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{
    protected $table='user_info';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name','user_pwd','nick_name','sex','level_id','face_id',
        'gold','diamond','lost_count','win_count','ticket','max_win',
        'four_fold_card','eight_fold_card','ban_than','change_card',
        'vip_type','province','city','register_date','last_login_date',
        'phone_number','flatform_type','imsi','imei','model','contact',
        'birthday','enable','login_count','conti_login_count','give_count',
        'version','channel','user_type',
    ];

}
