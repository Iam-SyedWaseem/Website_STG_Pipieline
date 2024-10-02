<nav class="navbar" style="background-color: #283759 !important;">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">
      <img src="{{asset('assest/images/logo-final.png')}}" alt="Logo" style="width:50%;"  class="d-inline-block align-text-top">

    </a>

    <!-- <a href="{{route('jobposts.index')}}" class="btn btn-info">Jobs</a> -->

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
  </div>
</nav>
