<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
          <div class="col-md-4 mx-auto">
           
                <form action="/loginUser" method="post" >
                  @csrf
                    <h1 class="fw-light">Login Form</h1>
                    <div class="mb-3 mt-3">
                      @if(session('errorStatus'))
                      <h4 class="text-danger">{{ session('errorStatus') }}</h4>
                      @endif
                      <label  class="form-label ">Username</label>
                      <input type="text" name="username" class="form-control">
                    </div>@error('username')
                    <div class="text-danger"> {{ $message }}</div> 
                  @enderror
                    <div class="mb-3">
                   
                      <label  class="form-label">Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>@error('password')
                    <div class="text-danger"> {{ $message }}</div> 
                  @enderror
                  <div class="mb-3">
                      <a href="forgotPasswordView" style="margin-left: 105px;">Forgot Password???</a>
                  </div>
                  <div class="mb-3">
                    <a href="registrationView" style="margin-left: 105px;">Register Here!!</a>
                </div>
                   
                    <button type="submit" class="btn btn-primary" style="width: 130px; margin-left: 30%">Login</button>
            
                  </form>
            
          </div>
        </div>
      </div>
   
   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>