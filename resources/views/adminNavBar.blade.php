
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="padding-left: 30px;" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/adminDashboard">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/borrowers">Borrowers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/libraryInfo">Library</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
              @if (url()->current()=='http://127.0.0.1:8000/libraryInfo')
              <form action={{ route('libraryInfo') }} method="get" class="form-inline my-2 my-lg-0" style="display: flex;flex-direction:row;margin-left:660px">
                <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search" style="margin-right: 20px">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
              @endif
              
          </ul>
        </div>
      </nav>
   </body>
</html>

   
    
  

