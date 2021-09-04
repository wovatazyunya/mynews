<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    
    // 以下を追記
    // News Modelに関連付けを行う
    public function histories()
    {
      return $this->hasMany('App\ProfilesHistory');

    }

}
