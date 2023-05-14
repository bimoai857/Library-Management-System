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
           
                <form action="/addBorrower" method="post" >
                  @csrf
                    <h1 class="fw-light">Add a Borrower</h1>
                    @if(session('addBorrower'))
                    <h4 class="text-success">{{ session('addBorrower') }}</h4>
                    @endif
                    <div class="mb-3 mt-3">
                        
                      <label  class="form-label ">Email</label>
                      <input type="email" name="email" class="form-control">
                      @error('email')
                    <div class="text-danger"> {{ $message }}</div> 
                  @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        <label  class="form-label ">Book Id</label>
                        <input type="text" name="bid" class="form-control">
                        @error('bid')
                    <div class="text-danger">The Book Id field is required.</div> 
                  @enderror
                      </div>
                      <div class="mb-3 mt-3">
                        <label  class="form-label ">Date of Submission</label>
                        <input type="date" name="dos" class="form-control">
                        @error('dos')
                        <div class="text-danger"> The Date of Submission field is required.</div> 
                      @enderror
                      </div>
                    <button type="submit" class="btn btn-primary" style="width: 130px ;margin-left: 30%;margin-top:30px;">Add</button>
                  </form>
                  <div style="margin-top:30px;">
                    <a href="/borrowers" class="text-success" style="padding-left:30px;margin-left: 30%">Go Back</a>
                  </div>

          </div>
        </div>
      </div>
   
   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>