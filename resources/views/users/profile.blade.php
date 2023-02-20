<section>
@extends('layouts.app')

</section>

<section>
@section('content')
</section>
<section>
  
<div class="content " style=" margin-left:33px; margin-right:33px;">
    
     <div class="row ">
        <div class="col-md-6  offset-md-3">
        <div class="input-group ">
        <input type="text" class="form-control" data-toggle="modal" data-target="#postModal" placeholder="Create Post" aria-label="Recipient's username">
        
        </div>
        </div>
</div>

   <div class="row" style="margin-top: 34px;">
     <div  class="col-lg-3">
      <div class="card">
        <div class="card card-header">तपाईको व्यावसायको अगाडीको फोटो ।
        </div>
        <div class="card-body">
           <img src="images/{{$pp}}"  class="rounded-circle"  style=" max-width: 100%; height: auto; float: left;  margin-right: 25px;  cursor: pointer;" >
        </div>
        
      </div>
    </div>


    
        <div class="col-sm-7 col-md-7 col-lg-6 text-muted col-md-offset-0" >
            <div class=" card "style=" height:340px;border-radius:1% ;"> 
                <div class="card card-header">
                        <h1 class="text-center " style=" font-family:noto; color: black;
                            text-shadow: 0.075em 0.08em 0.1em rgba(0, 0, 0, 1);"> <span class="border-bottom ">{{$bname}}</span></h1>
                      
                        <h3 class="text-left text-center font-italic mt-3"  style=" font-family:noto; color: black;" > 
                        <span>{{$district}}:</span>
                        <span>{{$locallevel}}</span>
                        <span>{{$ward}}</span>
                        <span>{{$tole}}</span></br>
                        <span> contact no : </span><span class="text-dark font-">{{$phone}}</span></span>
                        </h3>
                 </div>
                   <div class=" card-body">                     
                        <span style="font-size:15; color:black;">Our Featurs & Services:</span> <hr> <i class="fa fa-hand-o-right"></i><span style="font-size:13; color:black;">{{$services}}
                        </span> 
                    </div>
            
                      

             </div>
         </div>   
              
        
          


          <!-- <div class="col-sm-12  col-lg-3"> -->
                  <!-- <div class =" card pt-1 text-center "  >
                      <a href="#" class="text-decoration-none font-weight-bold" onMouseOver="this.style.color='red';this.bgcolor='red';" onMouseOut="this.style.color='black'" >
                          <bottom>About<i class="fa fa-book float-right mr-3"></i></bottom>
                      </a>
                  </div>
                  <div class =" card pt-1 text-center mt-3"  >
                      <a href="#" class="text-decoration-none font-weight-bold" onMouseOver="this.style.color='red';this.bgcolor='red';" onMouseOut="this.style.color='black'" >
                          <bottom>Photos<i class="fa fa-photo float-right mr-3"></i></bottom>
                      </a>
                  </div>
                  <div class =" card pt-1 text-center mt-3"  >
                      <a href="#" class="text-decoration-none font-weight-bold" onMouseOver="this.style.color='red';this.bgcolor='red';" onMouseOut="this.style.color='black'" >


 <bottom>Update map<i class="fa fa-map-marker float-right mr-3"></i></bottom>
                      </a>
                  </div> -->
<div class="col-sm-12  col-lg-3">

<div class="card">
<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$lat}},{{$lng}}&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
 </iframe>
 </div>
  
    
  @if (Session::get('user'))



<div class="dropdown pull-right" >
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownmenu" data-toggle="dropdown" >
       change details
        </button>
    <div class="dropdown-menu" aria-labelledby="">

        <button type="button" class="btn btn-light hblue" data-toggle="modal" data-target="#EditModal">
                        Edit Your Information
        </button>
        <button type="button" class="btn btn-light hblue" data-toggle="modal" data-target="#ppModal">
        Upload Profile Picture
        </button><br>
        <button type="none"  class="invisible" data-toggle="modal">

      
   <form action="saveownermap" method='POST'>
            @csrf
            <span id="demo" style="font-size:1px;">demo</span>
            <input  type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
            
            <button type="submit"class="btn btn-light hblue " > update location</button>
            </form>     
<script>
var x = document.getElementById("demo");
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
        </button>
     </div>
</div>
   @endif


          </div>
       </div>
      
     
<!--this is starting for my activity oe post part-->
<div class="row m-3">   
    <div class="col-lg-12 ">

            <div class="card ">
        <div class="card-header text-center"><i class=" fa fa-arrow-down mx-5"></i>all postes <span> <i class=" fa fa-arrow-down mx-5"></i></span> 

        </div> 
         <!--this is for post of business-->
        <!-- ther is select * from database -->
 

        <div class="card text-dark">
            <div class=" shadow">

          <span class="mx-3 text-primary"><i class="fa fa-user"></i><a href="http://rishirajbhusal.blogspot.com/"> rishiram bhusal</a></span><br>
            <i class="float-left ml-3 small "> -2075/12/23 ( 10:54 pm)</i>
        <!-- there is  edit located -->
                      
          </div>


            <div class=" card-body shadow"> 

           there is image situated you can visit on extra user_profile1
              <p class="text-dark">

             this is your post 
              </p>

            </div>   
        </div>


    </div><div class="card-fotter"> this is footer </div>

</div>
 
@endsection()



<!--  java script code for user location -->



<!-- modal for profile photo -->



<div class="modal fade" id="ppModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">change profile picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" action="savepp" method="POST" name="myform" >
                    @csrf     
                          <input type="file" name="pp">
                          <input type="submit" class="pull-right btn btn-primary btn-sm">
                        </form>
     </div>
     
    </div>
  </div>
</div>

<!-- script code  for  profile image validation-->
<!-- 
<script>
        var img= document.forms['myform']['pp'];
        var validExt=["jpeg", "png", "jpg"];

        function validation()
        {
            if(img.value!='')
            {
          
                var img_ext= img.value.substring(img.value.lastIndexOf('.')+1);

                 var result= validExt.includes(img_ext);
                 if(result==false)
                 {
                     alert(" not a image");
                     return false;
                 }
                 else{
                     if(parseFloat(img.files[0].size/(1024*1024))>=1)
                     {
                         alert("File size should less then 1 MB");
                         return false;
                     }
                 }

            }
            else
            {
                alert( " no image is selected");
                return false;

            }
        }
    </script> -->






<!-- Modal  for post-->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Share Your Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{url('post')}}" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Post Title</label>
            <textarea class="form-control col-lg-7" id="exampleFormControlTextarea1"  name="post" rows="3"></textarea>
        </br>
        </br>
            <input type="file" name="image">
                        <button type="submit" class="btn btn-success pull-right">Upload Image</button>

  </div>
</form>
     </div>
     
    </div>
  </div>
</div>

<!-- Modal for detal post -->

<div class="modal" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Complete The  Information to complete your profile.</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
<form action="savedetails" method="POST" >
        @csrf<div>
          <select  class="form-control"id="type" name="type">
          <option value="hospital">hospital</option>
          <option value="college">college</option>
          <option value="institute">institute</option>
          <option value="hotels">hotels</option>
          <option value="store">store</option>
        </select>
        </div>
        <br>
      <input type="text" class="form-control"  placeholder="Your  Bussiness Name" name="bname" required></br>
      <input type="text" class="form-control"  placeholder="Your Distict" name="district" required></br>

      <input type="text" class="form-control"  placeholder="Local Level" name="locallevel" required></br>
      <input type="text" class="form-control"  placeholder="enter Ward no." name="ward" required></br>

      <input type="text" class="form-control"  placeholder="Enter Tole /Ward" name="tole" required></br>
      <input type="text" class="form-control"  placeholder="Phone Number" name="phone" required></br>
      <textarea rows="2" cols="50" name="service"  class="form-control">
                     Write Your servicess here...</textarea>


     </div>
              <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Data</button>
          </form>

        </div>
        
      </div>
    </div>
  </div>
  