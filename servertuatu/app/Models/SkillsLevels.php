<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillsLevels extends Model
{
    //

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'skills_levels';

    protected $fillable = [
        'type','job_title_type','description','goal','evaluation_id'
    ];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'description' => 'string',
        'job_title_type' => 'string',
        'goal' => 'integer',
        'evaluation_id' => 'integer'
    ];

    public function evaluation()
    {
        return $this->belongsTo('App\Models\Evaluations');
    }

}
