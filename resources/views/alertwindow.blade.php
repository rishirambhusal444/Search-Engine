
<!DOCTYPE html>
<html lang="en">
<head>
  <title>login alart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container-fluid">
<section>
@extends('layouts.app')
</section>
<section>
@section('content')
</section>


<div class="content alert alert-warning" style=" margin-left:20px; margin-right:20px;">

        
@if (Session::get('nothaveuser'))
<div class="row">
    <div class="col-md-8 offset-2  alert alert-danger ">
        <div class="card-contentwhite-text">
<h2>        {{Session::get('nothaveuser')}}</h2>
<div class="button-group pull-right"><button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#registermodal">
                        regster
</button>
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#loginModal">
lOGIN</button>
</div>

      </div>
    </div>
  </div>
            
@endif      


       
@if (Session::get('already_have'))
<div class="row">
    <div class="col-md-8 offset-2  alert alert-danger ">
        <div class="card-contentwhite-text">
<h2>        {{Session::get('already_have')}}</h2>
<div class="button-group pull-right"><button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#registermodal">
                        regster
</button>
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#loginModal">
  LOGIN
</button>
</div>

      </div>
    </div>
  </div>
            
@endif      
        
</div>


<!-- end of row  -->
        <!-- this is location cordinate and poste in database-->


</section>
@endsection
















   
</div>

</body>
</html>
