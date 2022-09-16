<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    //

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $table = 'evaluations';  

    protected $fillable = [
        'name','description','avg_skills','avg_functions'
    ];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'avg_skills' => 'integer',
        'avg_functions' => 'integer'
    ];

    public function skillsEvaluations()
    {
        return $this->hasMany('App\Models\EvaluationSkills');
    }

    public function functionsEvaluations()
    {
        return $this->hasMany('App\Models\EvaluationFunctions');
    }
}
