<section>
@extends('layouts.app')
</section>
<section>
@section('content')
</section>
<!-- this is frontend for distance -->

<!-- 
<div class="row"> 
    <div class=" col-2">   lat-1 : <input id="lat1"></div>
    <div class=" col-2">     lat-2 : <input id="lat2"></div>
    <div class=" col-2">    lon-1 : <input id="lon1"></div>
    <div class=" col-2">     lon-2 : <input id="lon2"></div>
    <div class=" col-2"><button onclick="calculate()">distance</button>
    <input id="distance"></div>
</div> -->


       
        

@if (Session::get('alert'))
<div class="row">
    <div class="col-md-4 offset-4 alert alert-warning">
        <div class="card-content alert alert-danger white-text">
        {{Session::get('alert')}}
        
      </div>
    </div>
  </div>
            
@endif

@if (Session::get('load_location'))
<div class="row">
    <div class="col-md-4 offset-4 alert alert-warning">
        <div class="card-content alert alert-danger white-text">
        {{Session::get('load_location')}}
        
      </div>
    </div>
  </div>
            
@endif
@if (Session::get('nodata'))
<div class="row">
    <div class="col-md-4 offset-4 alert alert-warning">
        <div class="card-content alert alert-danger white-text">
        {{Session::get('nodata')}}
        
      </div>
    </div>
  </div>
            
@endif

<div class="content" style=" margin-left:20px; margin-right:20px;">
<div class="row ">
        <div class="col-md-8 offset-md-2">
        <div class="input-group ">
        <input type="text" class="form-control" placeholder="Search hotels etc" aria-label="Recipient's username">
        <div class="input-group-addon">
            <span class="input-group-text"><i class="glyphicon glyphicon-search"></i></span>
        </div>
        </div>
        </div>
</div>


<div class="row mt-3">
<div class="col-md-8 offset-md-3 text center">
<div class="d-none" id ="demo">rishii</div>
    <div class="btn-group" style="max-height:40px;">
        <button type="button" class="btn btn-light hblue">hospitals</button>
        <button type="button" class="btn btn-light hblue">institute</button>
        <button type="button" class="btn btn-light hblue">schools</button>
        <button type="button" class="btn btn-light hblue">hotels</button>
        <button type="button" class="btn btn-light hblue ">fashion </button>

    <button type="button" class=" btn btn-disable">
    <form action="savecurrentmap" method="POST">
    <p id="demo" style="font-size:0.1px; ">demo</p>

       @csrf 
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
        <button type="submit"class="btn btn-light hblue m-1" ><i class="glyphicon glyphicon-map-marker" style="font-size:22px;"></i>   </button>
        </form>
    </button>
    </div>
</div>
</div> 

<!-- end of row  -->
        <!-- this is location cordinate and poste in database-->


<script>
var x = document.getElementById("demo");
// var x = document.getElementById("demo").onclick =function();

var latitude = 0;
var longitude = 0;
getLocation();
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
  latitude = position.coords.latitude;
  longitude = position.coords.longitude;
document.getElementById('latitude').value = latitude;
document.getElementById('longitude').value = longitude;

}
</script>
<!--this is hompage table displays -->
@if (Session::get('havedata'))

<div class=" d-flex justify-content-center m-5">


@foreach($distance->chunk(1000) as $person)

<div class="row  ">
   @foreach($person->take(9) as $user)
   <div class="col-md-4 mt-5" >
   <div class="card"  >
    <div class="card-body">
         <div class="card-img-actions"> <img src="/images/{{$user->PP}}" class="card-img img-fluid" width="96" height="350" alt=""> 
         </div>
    </div>
    <div class=" text-center " style="background-color:#DCDCDC; height: 110px ;"onclick="window.location='';">  
    <div class="mb-0 font-weight-semibold text-uppercase font-weight-bold" style=" font-family:noto; color: black;  text-shadow: 0.055em 0.08em 0.1em rgba(0, 0, 8, 0); font-size:20px;" > {{$user->Bname}}</div>
<h4 class=" font-italic " style= "color:rgba(0, 3, 2, 99);" >{{$user->District}} {{$user->LocalLevel}} {{$user->Ward}} {{$user->Tole}}</h4>
<h5 class="font-weight-bold text-dark"> {{ Str::limit($user->distance, 5) }} meter <span class="text-dark"> far away</span></h5>   
 <div class="text-right">

</div>
    </div>
    </div>
 </div>
   @endforeach
</div>   


@endforeach
</div>
@endif
              
    
<!--end of business display area-->
      
</div>


</div>
      <!-- <div id="demo">demo</div>
      <input type="text" id="latitude">
      <input type="" id="longitude">
       -->




<!--  part of footer -->
<!-- s -->
<!-- 

</footer>


modal   for  contact us
<div class="modal fade" id="contact" role="dialog">
<div class="modal-dialog">

Modal content
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Contact Us</h4>
</div>
<div class="modal-body">
<p>
phone: 9867397140 
</p>
<p>
9867397148
</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>

modal   for about us page
<div class="modal fade" id="about" role="dialog">
<div class="modal-dialog">

Modal content
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">About Us</h4>
</div>
<div class="modal-body">
<p>We Provides different software and Networking Packages. </p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>

modal   for meet us page
<div class="modal fade" id="meet" role="dialog">
<div class="modal-dialog">

Modal content
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">About Us</h4>
</div>
<div class="modal-body">
<p>
Web Developer: Rishiram Bhushal
</p>

<p>
Web Developer: Tilak Adhikari
</p>
<p>
Web Developer: Sandesh Bhushal
</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div> --}} -->

</div>
</div>
</section>
@endsection