<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewThreeProbability extends Model
{
    protected $table='ViewThreeProbability';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'awardpattern','sessioncount','tsessioncount','threebetgoldsum','threeawardgoldsum','threeawardcount',
    ];

}
