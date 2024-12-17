<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;


class Parichay extends Model
{
    // use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'person_name',
        'person_image',
        'person_birthday',
        'person_gender',
        'person_baptism',
        'person_height',
        'person_hobbies',
        'person_cast',
        'person_lang',
        'person_qualification',
        'person_job',
        'person_city',
        'person_marital',
        'person_monthly_income',
        'person_fname',
        'person_mname',
        'person_sibling',
        'person_address',
        'person_pastorname',
        'person_church'
        'person_denomination',
        'person_preference',

    ];

   
    
}
