<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
          <div class="col-md-4 mx-auto">
           
                <form action="/fpEmailVerification" method="post" >
                  @csrf
                    <h1 class="fw-light">Enter Your Email For Verification</h1>
                    @if(session('verifyStatus')=='1')
                    <h4 class="text-success">Email Sent!!</h4>
                    @elseif (session('verifyStatus')=='0')
                    <h4 class="text-danger">Email Doesn't Exist!!</h4>
                    
                    @endif
                    <div class="mb-3 mt-3">
                        
                      <label  class="form-label ">Email</label>
                      <input type="email" name="email" class="form-control">@error('email')
                    <div class="text-danger"> {{ $message }}</div> 
                  @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 130px; margin-left: 30%">Send</button>
            
                  </form>
            
          </div>
        </div>
      </div>
   
   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>