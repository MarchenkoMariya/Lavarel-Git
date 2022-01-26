<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundations\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifable;

    @var

protected $fillable = [
    'name', 'email', 'password',
];


    @var

protected $hidden = [
    'password', 'remember_token',
];
}
