<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationFunctions extends Model
{
    //
    protected $table = 'evaluation_functions';    

    protected $fillable = [
        'user_id', 'user_document_evaluated', 'function_id','value','description','evaluation_id'
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
