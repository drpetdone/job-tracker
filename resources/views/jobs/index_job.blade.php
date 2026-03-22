<!DOCTYPE html>
<html>
<head>
    <title>Job Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<a href="/" style="margin-left:10px" class="mb-4 btn btn-sm btn-info">Home Page</a>

<h1 class="mb-4">Add New Job</h1>

 
<form method="POST" action="/job_t" class="mb-4">
    @csrf 
    <div class="row">
        <div class="col">
                <label for="company">Company</label>
                <input type="text" name="company" id="company" class="form-control">
            </div>
            <div class="col">
                <label for="position">Position</label>
                <input type="text" name="position" id="position" class="form-control">
            </div>
            <div class="col">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Applied">Applied</option>
                    <option value="Interview">Interview</option>  
                    <option value="Rejected">Rejected</option> 
                </select> 
            </div>
            <div class="col">
                <label for="notes">Notes</label>
                <input type="text" name="notes" id="notes" class="form-control">
            </div>     
    </div><hr>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Add Job</button>
        </div>
    </div>
</form>
<hr>
<h3>Job Lists</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Company</th>
            <th>Position</th>
            <th>Status</th>
            <th>Notes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{$job->company}}</td>
                <td>{{$job->position}}</td>
                <td>
                    <span class="badge bg-primary">{{$job->status}}</span>
                </td>
                <td>{{$job->notes}}</td>
                <td>
                    <a href="/job_t/{{ $job->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="/job_t/{{ $job->id }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
 

</body>
</html>