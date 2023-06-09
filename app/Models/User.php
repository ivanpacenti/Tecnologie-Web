<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey ='id';
    public $timestamps = false; // per poter modificare
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'username',
        'password',
        'età',
        'telefono',
        'genere',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'username',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->role, $role);
    }

    public function getUtenti(){
        return User::all();
    }

    public function getUtentebyID($id){
        return User::find($id);
    }
    public function getStaff(){
        return User::where('role', 'LIKE', '%staff%')->get();
    }


}
