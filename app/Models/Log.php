<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $primaryKey = 'Id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'LogLevelId','ShortMessage','FullMessage','IpAddress','ProxyId','PageUrl','ReferrerUrl','CreatedOnUtc',
    ];

    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable('log');

        parent::__construct($attributes); 
    }

}
