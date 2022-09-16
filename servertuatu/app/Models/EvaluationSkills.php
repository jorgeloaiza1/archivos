<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationSkills extends Model
{
    //
    protected $table = 'evaluation_skills';    

    protected $fillable = [
        'user_id', 'user_document_evaluated','skill','description','value','evaluation_id'
    ];

    public function evaluation()
    {
        return $this->belongsTo('App\Models\Evaluations');
    }    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
