<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $dates = ['created_at', 'updated_at', 'birth_date', 'partner_birth_date'];

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d m Y', $value);
    }

    public function setPartnerBirthDateAttribute($value)
    {
        $this->attributes['partner_birth_date'] = ($this->status == 'married') ? Carbon::createFromFormat('d m Y', $value) : null;
    }

    public function setPartnerFirstNameAttribute($value)
    {
        $this->attributes['partner_first_name'] = ($this->status == 'married') ? $value : '';
    }

    public function setPartnerLastNameAttribute($value)
    {
        $this->attributes['partner_last_name'] = ($this->status == 'married') ? $value : '';
    }

    public function setPartnerMobilePhoneAttribute($value)
    {
        $this->attributes['partner_mobile_phone'] = ($this->status == 'married') ? $value : '';
    }

    public function setPartnerEmailAttribute($value)
    {
        $this->attributes['partner_email'] = ($this->status == 'married') ? $value : '';
    }
    public function setSendToMailAttribute($value)
    {
        $this->attributes['send_to_mail'] = ($value) ? $value : false;
    }
    public function setSendToMobileAttribute($value)
    {
        $this->attributes['send_to_mobile'] = ($value) ? $value : false;
    }

    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getPartnerBirthDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function user()
    {
        return $this->hasOne('App/User');
    }
//    public function orders(){
//        return $this->hasMany('App\Order');
//    }

}
