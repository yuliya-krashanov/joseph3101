<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ContactForm
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property-write mixed $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ContactForm whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactForm whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactForm wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactForm whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactForm whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ContactForm whereCreatedAt($value)
 */
class ContactForm extends Model
{
    protected $table = 'contact_forms';

    protected $fillable = ['name','email','phone', 'message'];

    public function setUpdatedAtAttribute($value)
    {
    // Do nothing.
    }

}
