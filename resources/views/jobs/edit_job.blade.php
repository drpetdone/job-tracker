<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h1 class="mb-4">Edit Job Tracker</h1>

 
<form method="POST" action="/job_t/{{$job->id}}" class="mb-4">
   @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
                <label for="company">Company</label>
                <input type="text" name="company" id="company" value="{{ $job->company }}" class="form-control">
            </div>
            <div class="col">
                <label for="position">Position</label>
                <input type="text" name="position" id="position" value="{{ $job->position }}" class="form-control">
            </div>
             <div class="col">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{$job->status =='Applied' ? 'selected':'' }} value="Applied">Applied</option>
                    <option {{$job->status =='Interview' ? 'selected':'' }} value="Interview">Interview</option>  
                    <option {{$job->status =='Rejected' ? 'selected':'' }} value="Rejected">Rejected</option> 
                </select> 
            </div>
            <div class="col">
                <label for="notes">Notes</label>
                <input type="text" name="notes" id="notes" value="{{ $job->notes }}" class="form-control">
            </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/job_t" style="margin-left:10px" class="btn btn-sm btn-info">Back</a>

        </div>
    </div>

</form>

</body>
</html>