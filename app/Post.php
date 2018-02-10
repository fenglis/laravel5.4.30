<?php

namespace App;

use App\Model;

//Post => posts表
class Post extends Model
{
    //关联用户
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
