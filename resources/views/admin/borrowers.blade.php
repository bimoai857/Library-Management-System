<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borrowers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  @include('adminNavBar') 
<h3><a href="/addBorrower" style="padding-left:30px;padding-top:30px;" class="text-success">Create Borrowers</a></h3>
<div style="display: flex; flex-direction:row; flex-wrap:wrap">
  @if (count($users)!=0)
  @for($i=0;$i<count($users);$i++)
  <div style="padding-left:30px;padding-top:30px; margin-right:20px;">
      <div class="card border-success mb-3">
          <div class="card-header text-success" style="">{{ $users[$i]['username'] }}</div>
          <div style="padding: 10px;">
            <p>Name: {{ $users[$i]['name'] }}</p>
            <p>Email: {{ $users[$i]['email'] }}</p>
            <a href="bookInfoAdmin/{{ $users[$i]['id'] }}" class="text-success">Books</a>
        
          </div>
        </div>
      </div>

@endfor
@else
<h3 style="padding-left:30px;padding-top:30px;" class="text-danger">No Borrowers!</h3>

  @endif
 
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>