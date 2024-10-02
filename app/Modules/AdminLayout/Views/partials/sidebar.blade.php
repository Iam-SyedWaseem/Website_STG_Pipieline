 <!-- Sidebar -->

 <style>
    .nav-link{
        color: #fff !important;
        font-weight: 600 !important;
    }
    .nav-link.active{
        color: #121212 !important;
    }
    .nav-link:hover{
        color: #121212 !important;
    }

 </style>
 <nav id="sidebar" class="col-md-3 col-lg-2 pt-4 d-md-block bg-dark sidebar collapse" style="height:1090px; background-color: #3a4f80 !important;">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{@$dashboard_menuactive}}" aria-current="page" href="{{route('dashboard')}}">
                <i class="bi bi-house-door"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{@$enquiry_menuactive}}" href="{{route('contacts')}}">
                <i class="bi bi-file-earmark-text"></i> Enquiries
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  {{@$job_menuactive}}" href="{{route('jobposts.index')}}">
                <i class="bi bi-cart"></i> Jobs
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{@$jobapplication_menuactive}}" href="{{route('job-applications')}}">
                <i class="bi bi-people"></i> Job Applications
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{@$seo_menuactive}}" href="{{route('pages.index')}}">
              <i class="bi bi-globe2"></i> Seo
              </a>
            </li>
          </ul>
        </div>
      </nav>
