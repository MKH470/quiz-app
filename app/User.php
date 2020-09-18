<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','visible_password','occupation','address','phone','is_admin'
    ];
    private $limit =10;
    private $order ='DESC';

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

    public function storeUser($data){
        $data['visible_password'] =$data['password'];
        $data['password'] =bcrypt($data['password']);

        return User::create($data);

    }
    public function getAllUsers(){
        return User::orderBy('created_at',$this->order)->paginate($this->limit);
    }
    public function getUserById($id)
    {
        return User::find($id);

    }
    public function updateUser($data,$id){
        $user= User::find($id);
        if($data['password']){
            $user->password=bcrypt($data['password']);
            $user->visible_password=$data['password'];
        }
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->occupation=$data['occupation'];
        $user->address=$data['address'];
        $user->phone=$data['phone'];
        $user->is_admin=$data['is_admin'];
        $user->save();
        return $user;
    }
  public function deleteUser($id){
        return User::find($id)->delete();
  }
}
