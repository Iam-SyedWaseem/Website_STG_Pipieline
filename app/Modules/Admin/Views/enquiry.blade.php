@extends('adminlayout::layouts.adminmain')
@section('title', 'Enquiries')

@section('content')

    
        <!-- <div class="row">
        <img class="mb-4" src="{{asset('assest/images/logo-final.png')}}" alt="Crystawall Technologies LLC" style="background: black;">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        </div> -->

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1>Enquiries</h1>
        </div>
          <!-- Search and Sort Form -->
           <div class="card-body">
          <div class="row">

          <div class="col-lg-6">
          <form method="GET" action="{{ route('contacts') }}" class="mb-3">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search by Name & Email">
                </div>

                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
                </div>
          </form>
          </div>
          <div class="col-lg-6">
          <form method="GET" action="{{ route('contacts') }}" class="mb-3">
          <div class="form-row">

<div class="form-group col-md-4">
    <select class="form-control" name="sort_by">
        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date</option>
        <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
    </select>
</div>
<div class="form-group col-md-4">
    <select class="form-control" name="sort_order">
        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
    </select>
</div>
<div class="form-group col-md-4">
    <button type="submit" class="btn btn-success">Apply</button>
</div>
          </div>
</form>
          </div>
         
        
        </div>
        </div>
          <!-- Table to display the contact inquiries -->
           <div class="card-body">
           <div class="table-responsive">
          <table class="table table-striped">
            <thead >
                <tr >
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Contact Details</th>
                    <!-- <th>Phone Number</th> -->
                    <th>Message</th>
                    <!-- <th>Website</th> -->
                    <th>Enquiry Date</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$contact)
               
                @php

                        $messageLimit = 10;
                        $message = $contact->message;
                        $showReadMore = strlen($message) > $messageLimit;
                        $shortMessage = Illuminate\Support\Str::limit($message, $messageLimit);
                    @endphp
                    <tr>
                        <td>{{$data->firstItem() + $key }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}<br><b>[Phone:{{ $contact->phone_no }}]</b></td>
                        <td>
                        {{ $showReadMore ? $shortMessage : $message }}
                            @if ($showReadMore)
                                <a href="#" class="text-primary read-more" data-toggle="modal" data-target="#detailsModal"
                                   data-id="{{ $contact->id }}"
                                   data-name="{{ $contact->name }}"
                                   data-email="{{ $contact->email }}"
                                   data-message="{{ $message }}">Read more</a>
                            @endif                        
                        </td>
                        <!-- <td>{{ $contact->message }}</td> -->
                        <!-- <td>{{ $contact->website }}</td> -->
                        <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
                        <td class="d-flex">
                            <a class="btn btn-info" href="{{ route('admin.show', ['id' => $contact->id,'action'=>'view']) }}" title="View"><i class="bi bi-eye-fill"></i></a>
                            @if($contact->status == 'open')
                            <a class="btn btn-primary ml-2" href="{{ route('admin.show', ['id' => $contact->id,'action'=>'reply']) }}">Reply</a>
                            @else
                            <a class="btn btn-secondary ml-2" href="#">Replied</a>

                            @endif
                       
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><span id="modal-message"></span></p>
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
                // var name = button.data('name');
                // var email = button.data('email');
                var message = button.data('message');

                // Update the modal's content.
                var modal = $(this);
                modal.find('#modal-id').text(id);
              //  modal.find('#modal-name').text(name);
              //  modal.find('#modal-email').text(email);
                modal.find('#modal-message').text(message);
            });
        });
    </script>
@endsection