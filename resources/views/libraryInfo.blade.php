
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .card {
          width: 270px;
         height: 320px;    
        }
      </style>
</head>
<body>
    @if ($admin==1)
    @include('adminNavBar')
    @else
    @include('userNavBar')
    @endif


    @if ($count==0 && $filtered)
    <h3 style="padding-left:30px;padding-top:30px;" class="text-danger">Not Found!</h3>
    <a href="/libraryInfo" style="padding-left:30px;padding-top:30px;" class="text-success">Go back to Library</a>
    @endif
    @if ($count==0 && !$filtered)
    @if ($admin==1)
    <h3><a href="/addBookView" style="padding-left:30px;padding-top:30px;" class="text-success">Create Books</a></h3>

    @endif
    <h3 style="padding-left:30px;padding-top:30px;" class="text-danger">Empty Library!</h3>
    @endif

    @if ($count==1)
    @if ($admin==1)
    <h3><a href="/addBookView" style="padding-left:30px;padding-top:30px;" class="text-success">Create Books</a></h3>

    @endif
    <div style="display: flex; flex-direction:row; flex-wrap:wrap">
      @for($i=0;$i<count($bookInfo);$i++)
        <div style="padding-left:30px;padding-top:30px; margin-right:20px;">
            <div class="card border-success mb-3">
                <div class="card-header text-success" style="">{{ $bookInfo[$i]['title'] }}</div>
                <div style="padding: 10px;">
                  <p>Author: {{ $bookInfo[$i]['author'] }}</p>
                  <p>Genre: {{ $bookInfo[$i]['genre'] }}</p>
                  @if ( $available[$i]>0)
                  <p class="text-success">Available</p>
                  @else
  
                  <p class="text-danger">Not Available</p>
                  @endif
                  
                </div>
              </div>
            </div>
    
    @endfor
  </div>
  @if ($filtered)
  <a href="/libraryInfo" style="padding-left:30px;padding-top:30px;" class="text-success">Go back to Library</a>
    
  @endif
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

   </body>
</html>

   
    
  

