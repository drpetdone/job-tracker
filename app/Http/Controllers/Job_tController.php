<?php

namespace App\Http\Controllers;
use App\Models\Job_t;
use Illuminate\Http\Request;
use Illuminate\SUpport\Facades\Auth;

class Job_tController extends Controller
{
    //save information from post
    public function store(Request $request)
    {
        //Job_t::create($request->all());
        Job_t::create([
            'user_id'=> Auth::id(),
            'company'=>$request->company,
            'position'=>$request->position, 
            'status'=>$request->status,
            'notes'=>$request->notes,
        ]);
        return redirect('/job_t');
    }
    //index method
    public function index()
    {
        $jobs = Job_t::where('user_id',Auth::id())->get();
        return view('/jobs/index_job',compact('jobs'));
    }

    //delete record
    public function destroy($id)
    {
        Job_t::findOrFail($id)->delete();
        return redirect('job_t');
    }
    //get information for editing
    public function edit($id)
    {
        $job = Job_t::findOrFail($id);
        return view('/jobs/edit_job', compact('job'));
    }
    //update record 
    public function update(Request $request,$id)
    {
        $job = Job_t::findOrFail($id);
        $job->update(
            [
               'company'=>$request->company,
               'position'=>$request->position, 
               'status'=>$request->status,
               'notes'=>$request->notes
            ]
        );
        return redirect('/job_t');
    }
}
