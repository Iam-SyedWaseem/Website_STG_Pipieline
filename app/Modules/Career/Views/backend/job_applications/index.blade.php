@extends('adminlayout::layouts.adminmain')
@section('title', 'Jobs')
@section('styles')
<style>
.status-new {
    background-color: #28a745; /* Green */
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
}

.status-closed {
    background-color: #dc3545; /* Red */
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
}

.status-inprogress {
    background-color: #ffc107; /* Yellow */
    color: black;
    padding: 5px 10px;
    border-radius: 5px;
}

</style>
@endsection
@section('content')
   
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1>Job Applications</h1>
        </div>
          <!-- Search and Sort Form -->
           <div class="card-body">
          <div class="row">

          <div class="col-lg-6">
          <form method="GET" action="{{ route('job-applications') }}" class="mb-3">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search Name and Job">
                </div>

                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
                </div>
          </form>
          </div>
          <div class="col-lg-6">

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
                    <th>Name</th>
                    <th>Job Post</th>
                    <th>Department</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
          
                @foreach ($data as $key=>$applications)
                    <tr>
                        <td>{{$data->firstItem() + $key}}</td>
                        <td>{{ $applications->full_name }}</td>
                        <td>{{  (isset($applications->job->title))? $applications->job->title : '' }}</td>
                        <td>{{ (isset($applications->job->department->name))?$applications->job->department->name:'' }}</td>
                        <td>
                        {{ $applications->full_phone_number }}              
                        </td>
                       
                        <td>{{ $applications->email }}</td>
                        
                        <td>
                        <select  class="form-control status-dropdown"
                                            data-application-id="{{ $applications->id }}"
                                            data-toggle-url="{{ route('application.toggleStatus', $applications->id) }}">
                                            <option value="new" {{ $applications->status == 'new' ? 'selected' : '' }}>New</option>
                                            <option value="inprogress" {{ $applications->status == 'inprogress' ? 'selected' : '' }}>Inprogress</option>
                                            <option value="closed" {{ $applications->status == 'closed' ? 'selected' : '' }}>Closed</option>
                                        </select>

                        </td>

                        <td class="d-flex g-2">

                        <a href="#" title="view" class="btn btn-info" data-toggle="modal" data-target="#detailsModal"
                                   data-id="{{ $applications->id }}"
                                   data-getdetail-url="{{ route('application.getdetails', $applications->id) }}"><i class="bi bi-eye-fill"></i></a>

                        <a  title="Resume" href="{{ $applications->resume_url }}" class="btn btn-primary ml-2 " target="_blank"><i class="bi bi-download"></i></a>

                         <!-- Delete Form -->
                <!-- <form action="{{ route('application.destroy', encrypt($applications->id)) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  title="Delete" class="btn btn-danger ml-2"><i class="bi bi-trash3-fill"></i></button>
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
         <!-- Modal HTML -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><strong>Status:</strong> <span id="modal-status" class="status-label"></span></p>
                <p><strong>Job:</strong> <span id="modal-job"></span></p>
                <p><strong>First Name:</strong> <span id="modal-firstname"></span></p>
                <p><strong>Last Name:</strong> <span id="modal-lastname"></span></p>
                <p><strong>Email:</strong> <span id="modal-email"></span></p>
                <p><strong>Phone:</strong> <span id="modal-countrycode"></span><span id="modal-phone"></span></p>
                <p><strong>Cover Letter:</strong> <span id="modal-cover"></span></p>
                <p><strong>Resume:</strong> <a id="modal-resume" href="#" target="_blank">Download Resume</a></p>
           
                    <p><span id="modal-status"></span></p>

                    <p><span id="modal-job"></span></p>

                    <p><span id="modal-firstname"></span></p>
                    <p><span id="modal-lastname"></span></p>
                    <p><span id="modal-email"></span></p>
                    <p><span id="modal-countrycode"></span><span id="modal-phone"></span></p>
                    <p><span id="modal-cover"></span></p>
                    <p><span id="modal-resume"></span></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
        $(document).ready(function () {
            $('#detailsModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                 var id = button.data('id'); // Extract info from data-* attributes
                 var getDetailUrl = button.data('getdetail-url');
                 $.ajax({
                url: getDetailUrl,
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    console.log(response)
                    // Update the modal's content.
                var modal = $(this);
                $('#modal-id').text(response.id);
                $('#modal-firstname').text(response.first_name);
                $('#modal-lastname').text(response.last_name);
                $('#modal-job').text(response.job.title);
                $('#modal-email').text(response.email);
                $('#modal-cover').text(response.cover);
                $('#modal-countrycode').text(response.country_code);
                $('#modal-phone').text(response.phone_number);
                $('#modal-status').text(response.status.toUpperCase());
                $('#modal-resume').attr('href', response.resume_url).text('Download Resume');
   // Apply status classes based on status value
   var statusClass;
        switch (response.status.toLowerCase()) {
            case 'new':
                statusClass = 'status-new';
                break;
            case 'inprogress':
                statusClass = 'status-inprogress';
                break;
            case 'closed':
                statusClass = 'status-closed';
                break;
            default:
                statusClass = ''; // Default class if none match
        }
        $('#modal-status').removeClass().addClass('status-label ' + statusClass);
   
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

                //  var firstname = button.data('firstname');
                //  var lastname = button.data('lastname');
                // var job=button.data('job');
                //  var email = button.data('email');
                // var cover = button.data('cover');
                // var countrycode = button.data('country_code');
                // var phone = button.data('phone');
                // var status = button.data('status');
                // var resume = button.data('resume');
                // // Update the modal's content.
                // var modal = $(this);
                // modal.find('#modal-id').text(id);
                // modal.find('#modal-firstname').text(firstname);
                // modal.find('#modal-lastname').text(lastname);
                // modal.find('#modal-job').text(job);
                // modal.find('#modal-email').text(email);
                // modal.find('#modal-cover').text(cover);
                // modal.find('#modal-countrycode').text(countrycode);
                // modal.find('#modal-phone').text(phone);
                // modal.find('#modal-status').text(status);
                // modal.find('#modal-resume').attr('href', resume).text('Download Resume');

             

            });
        });
    </script>
    <script>
    $(document).ready(function () {
        $('.status-dropdown').change(function () {
            var applicationId = $(this).data('application-id');
            var toggleUrl = $(this).data('toggle-url');
            var newStatus = $(this).val();

            $.ajax({
                url: toggleUrl,
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: newStatus
                },
                success: function (response) {
                    $('#application-' + applicationId + ' .status-dropdown').val(response.status);
                    showAlert('success', 'Status updated successfully.');
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Failed to update status. Please try again.');
                }
            });
        });

        function showAlert(type, message) {
            var alert = $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                            '<strong>' + message + '</strong>' +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>');

            $('.table').before(alert);

            setTimeout(function () {
                alert.fadeOut();
            }, 3000);
        }
    });
</script>
@endsection