<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deadline extends Model
{
    //protected $fillable = [
    //'subject', 'description'
    //];
    
  protected $guarded = []; //(This used to allow ALL in)
  
  public function tasks()
    {
    return $this->hasMany(Task::class);
    }
    
    public function addTask($task) {
        
        $this->tasks()->create($task);
        
       // return Task::create([
       //  'deadline_id' => $this->id,
       // 'description' => $description
       // ]);
        
    }

}

