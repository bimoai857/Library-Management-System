
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .card {
          width: 270px;
         min-height: 367px;
         
        }
      </style>
      
     
    
       
</head>
<body>
    @if (session('sessionStatus')!=$user->username)
    @php
        $flag=true;
    @endphp
    @include('adminNavBar')
    @else
    @php
        $flag=false;
    @endphp
    @include('userNavBar')
    @endif

    @if (count($issueInfo)!=0)
    <div style="display: flex; flex-direction:row; flex-wrap:wrap">
      @for($i=0;$i<count($issueInfo);$i++)
        <div style="padding-left:30px;padding-top:30px; margin-right:20px;">
            <div class="card border-success mb-3">
                <div class="card-header text-success" style="">{{ $bookInfo[$i]['title'] }}</div>
                <div style="padding: 10px;">
                  <p>Author: {{ $bookInfo[$i]['author'] }}</p>
                  <p>Genre: {{ $bookInfo[$i]['genre'] }}</p>
                  <p>Date of Issue: {{ $issueInfo[$i]['date'] }}</p>
                  <p>Date of Submission: {{substr($issueInfo[$i]['date_submission'],0,10 ) }}</p>
                  <p id='fine'></p>
                  <p>Time Remaining/ Time Past: </p>
                  <p id='timeRemaining{{$i}}'></p>
                 
        
                </div>
              </div>
            </div>
    @endfor 
</div>
@else
  <h3 style="padding-left:30px;padding-top:30px;" class="text-danger">No books Borrowed</h3>

    @endif

@if ($flag)
<a href="/borrowers" class="text-success" style="padding-left:30px;padding-top:30px">Go Back</a>
@endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
    @php
    $dueDates=array();
    for($i=0;$i<count($issueInfo);$i++){
      $dueDates[$i]=$issueInfo[$i]['date_submission'];
    }
    @endphp

<script>
    var myVariable = {!! json_encode($dueDates) !!};
   
    setInterval(() => {
    myVariable.forEach((variable,index) => {
    const start = moment();
    const dueDate=moment(variable);
    

    if(start.isBefore(dueDate)){
      const duration = moment.duration(dueDate.diff(start));

      const days = duration.days();
      const hours = duration.hours();
      const minutes = duration.minutes();
      const seconds = duration.seconds();
    $(`#timeRemaining${index}`).text( `${days} days ${hours} hr ${minutes} min ${seconds} sec`).css('color','#14A44D');
    }
    else{
    const duration = moment.duration(start.diff(dueDate));

    const days = duration.days();
    const hours = duration.hours();
    const minutes = duration.minutes();
    const seconds = duration.seconds();
      $(`#fine`).text('Fine: '+ days*10).css('color','#DC4C64');
      $(`#timeRemaining${index}`).text( `${days} days ${hours} hr ${minutes} min ${seconds} sec`).css('color','#DC4C64');
     

    }
  
    });
  }, 1000);
 
</script>
   </body>
</html>

   
    
  

