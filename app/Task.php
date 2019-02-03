<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
protected $fillable=['completed' ,'project_id','description'];
public function project(){

    return $this->belongsTo('App\Project','project_id');
}

public function complete($completed=true){

   // $this->update(['completed'=>$completed]);
    $this->update(compact('completed'));
}
}
