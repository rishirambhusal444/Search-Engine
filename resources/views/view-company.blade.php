<html>
   
   <head>
      <title>View Student Records</title>
   </head>
   
   <body>


            <h1>{{$count}}</h1> 
<h3>{{$countt}}</h3>
   </body>

    <form action="submitform" method="post">  

    <input type="text" name="name" id="">
     <input type="text" name="address" id="">
     <button type="submit">submit</button>
@csrf

    </form>

</html>  



