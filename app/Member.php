<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $dates = ['created_at', 'updated_at', 'birth_date', 'partner_birth_date'];

//    public function orders(){
//        return $this->hasMany('App\Order');
//    }

}
