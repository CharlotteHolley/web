<?php

namespace App\Http\Controllers;

use App\deadline;
use App\Mail\DeadlineCreated;

//use Illuminate\Http\Request;

class deadlineController extends Controller 
{

    
    public function index() {
        
     $deadlines = deadline::where('owner_id', auth()->id())->get();
        
        return view('deadlines/index', compact('deadlines'));
    }
    
    public function create() {
        
        return view('deadlines/create');
    }
    
    public function store() {
        
       $attributes = request()->validate([ 
        
        'subject' => ['required', 'min:5', 'max:60'],
        'description' => ['required', 'min:10', 'max:255']
        ]);
        
        $attributes['owner_id'] = auth()->id();
        
        $deadline = Deadline::create($attributes);
        
        \Mail::to('charlotteholley@email.com')-> send(
        new DeadlineCreated($deadline)
        );
        
        return redirect('/deadlines');
        
    }
    
    public function show(Deadline $deadline) {
        
        
        //abort_if($deadline->owner_id !== auth()->id(), 403);
        $this->authorize('update', $deadline);
        //abort_if(\Gate::denies('update', $deadline), 403);
           
        return view('deadlines/show', compact('deadline'));
    
    }
    
    public function edit(Deadline $deadline) {
        
       // $deadline = Deadline::findOrFail($id);
        
        return view('deadlines/edit', compact('deadline'));
    
    }
    
    public function update(Deadline $deadline) {
    
    $this->authorize('update', $deadline);
    
    $deadline->update(request(['subject','description']));
            
    $deadline->save();
    
    return redirect('/deadlines');
    
    }
    
    public function destroy(Deadline $deadline) {
        
        $this->authorize('update', $deadline);
        
        
        //dd('delete'.$id);
        
       //Deadline::findOrFail($id)->delete();
       
       $deadline->delete();
    
       return redirect('/deadlines');
    
    }

}
