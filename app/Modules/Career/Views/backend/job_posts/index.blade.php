@extends('adminlayout::layouts.adminmain')
@section('title', 'Jobs')

@section('content')
   
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1>Jobs</h1>
</div>
          <!-- Search and Sort Form -->
           <div class="card-body">
          <div class="row">

          <div class="col-lg-9">
          <form method="GET" action="{{ route('jobposts.index') }}" class="mb-3">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search Job Titles">
                </div>

                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
                </div>
          </form>
          </div>
          <div class="col-lg-3">
          <a href="{{ route('jobposts.create') }}" class="btn btn-primary ml-2">Create New Job Post</a>

          </div>
         
        
        </div>
        </div>
          <!-- Table to display the contact inquiries -->
           <div class="card-body">
           @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
          @endif

           <div class="table-responsive">
          <table class="table table-striped">
            <thead >
                <tr >
                    <th>Sl.No</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Posted Date</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
         
                @foreach ($data as $key=>$job)
               
                    <tr>
                        <td>{{$data->firstItem() + $key}}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->department->name }}</td>

                        <td>
                        {{ $job->posted_date }}              
                        </td>
                       
                        <td>{{ $job->expiry_date }}</td>
                        <td>{{ ($job->is_active == 1)?'Active':'Inactive' }}</td>

                        <td class="d-flex">
                         
                            <a href="{{ route('jobposts.edit', $job->id) }}" class="btn btn-info" title="Edit"><i class="bi bi-pencil-square"></i></a>
                <!-- <form action="{{ route('jobposts.destroy', $job->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger ml-2" type="submit" title="Delete"><i class="bi bi-trash3-fill"></i></button>
                </form> -->
                        </td>
                     

                    </tr>
                   
                @endforeach

            </tbody>
        </table>

        <!-- Pagination links -->
        <div class="d-flex justify-content-center mt-4">
            <!-- {{ $data->links() }} -->
            {{ $data->appends(request()->query())->links() }}

        </div>
           </div></div>
 
@endsection
