<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Add your CSS links here -->
       <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assest/css/bootstrap.min.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('assest/admin/admin.css')}}" type="text/css" media="all"/>

</head>



<body class="text-center">
    
<main class="form-signin w-100 m-auto">
<form action="{{ route('admin.loginSubmit') }}" method="POST">
    @csrf
<img class="mb-4" src="{{asset('assest/images/logo-final.png')}}" alt="Crystawall Technologies LLC" style="background: black;width: 100%;">
    <h1 class="h3 mb-3 fw-normal"></h1>

    <div class="form-floating">
      <input type="email"  name="email" class="form-control mb-3" id="floatingInput" placeholder="Email">
      @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-floating">
      <input type="password"  name="password" class="form-control mb-3" id="floatingPassword" placeholder="Password">
      @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
    </div>

   
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy;{{ date('Y') }}  All rights reserved. </p>
    
  </form>
</main>


    
  </body>
</html>
