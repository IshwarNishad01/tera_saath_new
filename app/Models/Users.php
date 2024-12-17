<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    
    use SoftDeletes;
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password','contact_number', 'code', 'phone','membership','marital_status','children','country','state','city','postal_code','degree','institute','designation','company','approved'
    ];
}