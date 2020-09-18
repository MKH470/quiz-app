<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>welcome quiztna</title>

  <!-- Bootstrap core CSS -->
<link href="{{asset('welcome/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('welcome/css/small-business.css" rel="stylesheet')}}">
 <!-- Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">QUIZTNA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            @if (Route::has('login'))

            @auth
                <a href="{{ url('/home') }}" class="nav-link">Home</a>
                @if(auth()->user()->is_admin==1)
                <a href="{{ url('/admin') }}" class="nav-link">Dashboard</a>
                @endif

            @else
                <a href="{{ route('login') }}" class="nav-link">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                @endif
            @endauth

        @endif
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
      <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="{{asset('edmin/code/images/welcome.jpg')}}" alt="">
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <h1 class="font-weight-light">Go ahead and test your skills</h1>
        <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
        <a class="btn btn-primary" href="#">Call to Action!</a>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">

    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- /.col-md-4 -->
 @php
      $quizzes=DB::table('quizzes')->get();
 @endphp
 @if(count($quizzes)>0)
 @foreach($quizzes as $quiz)
     <div class="col-md-4 mb-5">
       <div class="card h-100">
         <div class="card-body">
         <h2 class="card-title">{{$quiz->name}}</h2>
         <p class="card-text">{{$quiz->description}}</p>
         </div>
         <div class="card-footer">
           <a href="#" class="btn btn-primary btn-sm">More Info</a>
         </div>
       </div>
     </div>
 @endforeach
 @endif
      <!-- /.col-md-4 -->

      <!-- /.col-md-4 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; QUIZTNA 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('welcome/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('welcome/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>

