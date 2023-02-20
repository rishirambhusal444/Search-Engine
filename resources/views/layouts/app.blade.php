<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
<!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  -->
  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  


<style>
.none{ text-decoration: none; }
#div-wrapper {
    white-space: nowrap;
    max-width: 100%;
}

.single-div {
    width: 27%;
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    margin: 0 3%;
    white-space: normal;
}
.fb-header{
	width:100%;
	height:90px;
	top:0;
	left:0;
	color:white;
	font-family:verdana;
	
}

#form1{
	height:60px;
	width:180px;
	font-family:verdana;
	font-size:33px;
}
#form2{
	height:60px; 
	width:250px;
  float:right;
	font-family:verdana;
	font-size:33px;
}
.f-right{
  float:right;
}
.w-100{ width:100%;}
.hblue:hover{
  color:yellow;
  background:blue
}

</style>


</head>
<body style=" padding-top:3px; ">
    <div id="app">
      @include('navbar')

        <main class="py-4">
            <div class="container" style="  ">
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>





<!-- Modal -->
<div class="modal fade" id="registermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make Your Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 
      <div class="modal-body">
 
 
      <form action="newregister"  name ="registerform" method="POST"onsubmit ="return validateForm()">  
@csrf
      <div class="form-group row">
    <lable  class="col-md-4 col-form-label text-md-right"> Full Name* </lable>

    <div class="col-md-6">
    <input type = "text" id = "oname" value = "" class="form-control" name="oname"> 
    <span id = "blankMsg" style="color:red"> </span>
    </div>
    </div>

    <div class="form-group row">
      <lable  class="col-md-4 col-form-label text-md-right"> Email* </lable>
       <div class="col-md-6">
     <input  type ="text" name ="email" class="form-control">
       <span id = "emailmessage" style="color:red"> </span>
  </div>
  </div>

  <div class="form-group row">
  <lable  class="col-md-4 col-form-label text-md-right"> Password* </lable>
  <div class="col-md-6">
<input type = "password" id = "pswd1" value = "" class="form-control" name="password">   
<span id = "message1" style="color:red"> </span>
</div>
</div>

<div class="form-group row">
<lable  class="col-md-4 col-form-label text-md-right"> Confirm Password</lable>
<div class="col-md-6">
<input type = "password" id = "pswd2" value = "" class="form-control">   
<span id = "message2" style="color:red"> </span> 
</div>
</div>

 
      <div class="col-md-2 offset-md-9">
                 <button type="submit" class="btn btn-primary">
                       Register
                </button>
      </div>
</form>  


    </div>
  </div>
  
</div>
<!--  script code for priview image -->
 
<script>  
function validateForm() {  
    //collect form data in JavaScript variables  
    var name1 = document.getElementById("oname").value;
    var pw1 = document.getElementById("pswd1").value;  
    var pw2 = document.getElementById("pswd2").value;  
    
 var x=document.registerform.email.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  

    if(!isNaN(name1)){
      document.getElementById("blankMsg").innerHTML = "**Only characters are allowed";
      return false;
    }
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  document.getElementById("emailmessage").innerHTML = "*enter valid email id";  

  return false;  
  }  
    
    //check empty password field  
    if(pw1 == "") {  
      document.getElementById("message1").innerHTML = "**Fill the password please!";  
      return false;  
    }  
    
    //check empty confirm password field  
    if(pw2 == "") {  
      document.getElementById("message2").innerHTML = "**Enter the password please!";  
      return false;  
    }   
     
    //minimum password length validation  
    if(pw1.length < 5) {  
      document.getElementById("message1").innerHTML = "**Password length must be atleast 5 characters";  
      return  false;
        
    }  
    if(pw1.length < 5|| pw1.length >9) {  
      return true;  
    }  
  
    //maximum length of password validation  
    if(pw1.length >9) {  
      document.getElementById("message1").innerHTML = "**Password length must not exceed 15 characters";  
      return false;  
    }  
    
    if(pw1 != pw2) {  
      document.getElementById("message2").innerHTML = "**Passwords are not same";  
      return false;  
    } 
    else 
    {
     return true;
    }

    
 }  
</script>  




        <!-- <form method="POST" action="registers" onsubmit ="return validateform()">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">  Owner Full Name</label>
                            

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="oname">
                                <span id ="blankMsg" style ="color:red";></span><br>

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-from-lable">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email"  class="form-control" name="email">

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                <span id ="message1" style ="color:red";></span><br>

                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="confirm_password" type="password" class="form-control" value ="" name="password_confirmation">
                                <span id ="message2" style ="color:red";></span><br>
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <div class="col-md-4 offset-md-4">
                            
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form> -->
<!-- 
                 
<script>  function validateform() {  
    //collect form data in JavaScript variables  
    var name1 = document.getElementById("name").value;
    var pw1 = document.getElementById("password").value;  
    var pw2 = document.getElementById("confirm_password").value;  
    

    if(!isNaN(name1)){
      document.getElementById("blankMsg").innerHTML = "**Only characters are allowed";
      return false;
    }
    
   
    
    //check empty confirm password field  
    if(pw2 == "") {  
      document.getElementById("message2").innerHTML = "**Enter the password please!";  
      return false;  
    }   
     
    //minimum password length validation  
    if(pw1.length < 5) {  

    
      document.getElementById("message1").innerHTML = "** Hei password should be greater than 5 ";  
 
    }
   //check empty password field  
   
    //maximum length of password validation  
    if(pw1.length >9) {  
      document.getElementById("message1").innerHTML = "**Password length must not exceed 15 characters";  
      return false;  
    }  
    
    if(pw1 != pw2) {  
      document.getElementById("message2").innerHTML = "**Passwords are not same";  
      return false;  
    } else {  
      alert ("Your password created successfully");  
      document.write("JavaScript form has been submitted successfully");  
    }  
 }  
</script>   -->

      </div>
      
    </div>
  </div>
</div><!--<script>
function validateform() {  
    //collect form data in JavaScript variables  
    var name1 = document.getElementById("name").value;
    var pw1 = document.getElementById("password").value; 
    dd(pw1) ;
    var pw2 = document.getElementById("confirm_password").value;  
    

    if(!isNaN(name1)){
      document.getElementById("blankMsg").innerHTML = "**Only characters are allowed";
      return false;
    }
    
    //check empty password field  
    if(pw1 == "") {  
      document.getElementById("message1").innerHTML = "**Fill the password please!";  
      return false;  
    }  
    
    //check empty confirm password field  
    if(pw2 == "") {  
      document.getElementById("message2").innerHTML = "**Enter the password please!";  
      return false;  
    }   
     
    //minimum password length validation  
    if(pw1.length < 5) {  
      document.getElementById("message1").innerHTML = "**Password length must be atleast 5 characters";  
      return false;  
    }  
  
    //maximum length of password validation  
    if(pw1.length >9) {  
      document.getElementById("message1").innerHTML = "**Password length must not exceed 15 characters";  
      return false;  
    }  
    
    if(pw1 != pw2) {  
      document.getElementById("message2").innerHTML = "**Passwords are not same";  
      return false;  
    } else {  
      alert ("Your password created successfully");  
      document.write("JavaScript form has been submitted successfully");  
    }  
 }  
</script>   -->
<script>  


<!--  script code for form validation -->
