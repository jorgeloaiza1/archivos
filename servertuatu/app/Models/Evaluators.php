<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluators extends Model
{
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    //
    protected $table = 'evaluators';

    protected $fillable = [
        'user_id','user_name', 'user_job_title', 'user_job_title_link', 'user_photo_link', 'user_job_title_type','evaluator_id','evaluator_name','evaluation_type','weight','evaluate_functions','evaluate_skills','functions_done','skills_done','evaluation_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'user_name' => 'string',
        'user_job_title' => 'string',
        'user_job_title_link' => 'string',
        'user_photo_link' => 'string',
        'user_job_title_type' => 'string',
        'evaluator_id' => 'string',
        'evaluator_name' => 'string',
        'evaluation_type' => 'string',
        'evaluate_functions' => 'boolean',
        'evaluate_skills' => 'boolean',
        'functions_done' => 'boolean',
        'skills_done' => 'boolean',
        'evaluation_id' => 'integer'
    ];


    /*public function setEvaluateFunctionsAttribute($value)
    {
        $this->attributes['evaluate_functions'] = ($value == 'TRUE' || $value == true)? 1:0;
    }

    public function setEvaluateSkillsAttribute($value)
    {
        $this->attributes['evaluate_skills'] = ($value == 'TRUE'  || $value == true)? 1:0;
    }*/

    public function evaluation()
    {
        return $this->belongsTo('App\Models\Evaluations');
    }
}
