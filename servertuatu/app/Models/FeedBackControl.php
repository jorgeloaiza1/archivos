<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FeedBackControl extends Model
{
    //
    protected $table = 'feedbackcontrol';
    protected $fillable = [
        'user_document_evaluated','date','notes','status','evaluation_id', 'is_closed'
    ];
    protected $casts = [
        'is_closed' => 'boolean',        
    ];

    public function evaluation()
    {
        return $this->belongsTo('App\Models\Evaluations');
    }    

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value);
    }

    public function getDateAttribute($value)
    {
        return  Carbon::parse($value)->format('m/d/Y');
    }

}
