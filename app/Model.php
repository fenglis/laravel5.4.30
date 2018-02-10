<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    protected $guarded = []; //不可注入, 空数组表示所有都可以注入
    //protected $fillable = ['title', 'content']; //允许注入
}
