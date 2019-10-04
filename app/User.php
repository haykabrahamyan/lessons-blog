<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const STAFF_NAME = 'staff'; 
    const USER_NAME = 'user'; 
    const ADMIN_NAME = 'admin'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type_id','last_name'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Posts::class);
    }
    public function profile(){
        return $this->hasOne(Profiles::class,'user_id','');
    }

    public function setFullNameAttribute(){
        return $this->name . ' ' . $this->last_name;
    }
    public function setNameAttribute(){
        return $this->name . '----- ' ;
    }

    public function getFullNameAttribute(){
        return "{$this->name} {$this->last_name}";
    }

    public function aaa(){
        echo $this->name;
    }

    public function getType(){
        return $this->hasOne(UserTypes::class, 'id', 'user_type_id');
    }

    public function isStaff(){
        if($this->getType()->pluck('name')->first() == self::STAFF_NAME){
            return true;
        }
        return false;
    }
    public function isAdmin(){
        if($this->getType()->pluck('name')->first() == self::ADMIN_NAME){
            return true;
        }
        return false;
    }
    public function isUser(){
        if($this->getType()->pluck('name')->first() == self::USER_NAME){
            return true;
        }
        return false;
    }


    // djkfhlkasjdfas
    // fas
    // dfsa
    // dfasd
    // fas
    // dfas
    // df
    // asd
    // f
    // asd
    // fa
    // sd
}
