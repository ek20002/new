<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

protected $fillable=['title','description','owner_id'];

public function task(){

return $this->hasMany('App\Task','project_id');

}

public function addTask($Task){

    return $this->task()->create($Task);
}
}
