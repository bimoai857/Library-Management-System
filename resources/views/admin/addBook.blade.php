<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
          <div class="col-md-4 mx-auto">
           
                <form action="/addBook" method="post" >
                  @csrf
                    <h1 class="fw-light">Add a Book</h1>
                    @if(session('bookId'))
                    <h4 class="text-success">Book ID: {{ session('bookId') }}</h4>
                    @endif
                    <div class="mb-3 mt-3">
                        
                      <label  class="form-label ">Title</label>
                      <input type="text" name="title" class="form-control">
                      @error('title')
                    <div class="text-danger"> {{ $message }}</div> 
                  @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        <label  class="form-label ">Author</label>
                        <input type="text" name="author" class="form-control">
                        @error('author')
                    <div class="text-danger"> {{ $message }}</div> 
                  @enderror
                      </div>
                      <div class="mb-3 mt-3">
                        <label  class="form-label ">Genre</label>
                        <input type="text" name="genre" class="form-control">
                        @error('genre')
                        <div class="text-danger"> {{ $message }}</div> 
                      @enderror
                      </div>
                    <button type="submit" class="btn btn-primary" style="width: 130px ;margin-left: 30%">Add</button>
                  </form>
                  <div style="margin-left:120px; margin-top:30px;">
                    <a href="/libraryInfo" class="text-success" >Go to Library</a>

                  </div>

          </div>
        </div>
      </div>
   
   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>