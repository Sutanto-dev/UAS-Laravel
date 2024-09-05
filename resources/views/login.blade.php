<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope&display=swap');

        *{
            font-family: 'Manrope', sans-serif;
        }
      </style>
</head>
   <body>
    <section>
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-light" style="border-radius: 1rem;">
                <div class="card-body p-5 ">

                  <div class="mb-md-5 mt-md-1">

                    <h2 class="fw-bold mb-2 text-uppercase text-center">E-Market

                    </h2>
                    <p class="text-50 mb-2 text-center">Selamat Datang! Silahkan Login</p>
                    @if(Session::has('message'))
                     <p class="alert alert-success mb-0">{{ Session::get('message')}}</p>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{session('error')}}
                    </div>
                    @endif
                    <form action="{{ route('login-proses') }}" method="post">
                    @csrf
                    <div class="form-outline form-white mt-4 mb-4 ">
                        <label class="form-label align-left " for="typeEmailX">Email</label>
                      <input type="email" name="email" class="form-control form-control" placeholder="Masukkan email anda"/>
                      @error('email')
                  <small>{{ $message }}</small>
                  @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="typePasswordX">Password</label>
                      <input type="password" name="password" class="form-control form-control" placeholder="Masukkan password anda" />
                      @error('password')
                      <small>{{ $message }}</small>
                      @enderror

                    </div>


                    <button style="background-color: teal" class="btn btn-info text-white  px-3 form-control" type="submit">Login</button>
                    <a href="{{ 'register' }}" class="btn btn-outline-dark form-control mt-2">Register</a>


                    </form>
                  </div>
{{--
                  <div>
                    <p class="mb-0">Don't have an account? <a href="{{ 'register' }}!" class="text-white-50 fw-bold">Sign Up</a></p>
                  </div> --}}

                </div>
              </div>
            </div>
          </div>
        </div>
</section>


      {{-- <div class="container d-flex align-items-center justify-content-center vh-100">
         <div class="card">
            <div class="card-body">
               <h3 class="text-capitalize text-muted">Selamat Datang!</h3>
               <form action="{{ route('login-proses') }}" method="POST">
                  @csrf
                  <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email anda">
                  @error('email')
                  <small>{{ $message }}</small>
                  @enderror
<br>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password anda">
                  @error('password')
                  <small>{{ $message }}</small>
                  @enderror

<br>
<div class="d-grid gap-2">
<button type="submit" class="btn btn-primary text-capitalize">Login</button>
<a href="{{ 'register' }}" class="btn btn-secondary">Register</a>
</div>
               </form>
            </div>
         </div>
      </div> --}}

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      @if($message = Session::get('Success'))
      <script>
         Swal.fire('{{ $message }}');
      </script>
      @endif

      @if($message = Session::get('failed'))
      <script>
         Swal.fire('{{ $message }}');
      </script>
      @endif
   </body>
</html>
