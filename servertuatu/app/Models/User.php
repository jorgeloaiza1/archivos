<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'document' => 'string',
        'password' => 'string',
        'job_title' => 'string',
        'photo' => 'string',
        'oauth' => 'string',
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
        'remember_token' => 'string'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'document', 'password','photo', 'oauth', 'job_title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function getOauthAttribute($value){
      return json_decode($value);
    }

    public function getPhotoAttribute($value){
      /*if(!isset($value)){
          $disk = Storage::disk('gcs');
          $value = $disk->url('defaults/user.png');
      }
      return $value;*/
      return "https://ui-avatars.com/api/?name=".$this->attributes['name']."&size=300";
    }


    public function skillsEvaluations()
    {
        return $this->hasMany('App\Models\EvaluationSkills');
    }

    public function functionsEvaluations()
    {
        return $this->hasMany('App\Models\EvaluationFunctions');
    }
}
