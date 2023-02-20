@extends('layouts.app')
@section('title','Our contact')



@section('content')
<h1>Contact US</h1>



@if(Session::has('message'))
    


 
  <script type="text/javascript">
     swal({
         title:'Success!  Thanks For Contacting US you will be phoned by us.' ,
         text:"{{Session::get('success')}}",
         timer:8000,
         type:'success'
     }).then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
 @endif





@if(!session()->has('message'))




        <form action="/contact" method="POST">
            <div class="group">

                <label>Name</label>
                
              <input types ="text" name="name" value="{{old('name')}}" class="form-control">
              <p style="color:red;">{{$errors->first('name')}}</p>
          
            
                <div class="group">
                  <label>Email</label>
                  
                  <input types ="text" class="form-control" name="email"  value="{{old('email')}}">
                 <p style="color:red;"> {{$errors->first('email')}}</p>
                </div>

                <div class="group">
                        <label>Message</label>
                    <textarea cols="7" rows="9" class="form-control"  name ="message" value ="{{ old('message')}}">
                    </textarea>
                    
                       <p style="color:red;"> {{$errors->first('message')}}</p>
                      </div>

                      <button type="submit" class="btn btn-primary">Send</button>

                      @csrf
          
</form>
@endif
@endsection()