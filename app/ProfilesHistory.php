<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilesHistory extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        
        'edited_at' => 'required',
        'profile_id' => 'required'
        );
}
