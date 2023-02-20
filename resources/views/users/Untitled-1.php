

  <nav class="navbar  navbar-expand-lg navbar-light bg-white shadow-sm "  style=" margin-left:33px; margin-right:33px;">
  
  <ul class="navbar-header">
            <a class="navbar-brand kahaxa" href="{{ url('/') }}"> Kaha6new.com</a> 
    </ul>
  <button type="button" data-target="#collapseNavbar" data-toggle="collapse" class="navbar-toggler navbar-toggler-right">
    <span class="navbar-toggler-icon "></span>
  </button>
   <div class="navbar-collapse collapse" id="collapseNavbar">
    
    <ul class="nav navbar-nav mb-3 mr-auto nav-item ">
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
    </ul>
   <!-- Navigation register -->

    @if (Session::get('user'))
<ul class="nav-item navbar-right">
<div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownmenu" data-toggle="dropdown" >
        {{Session::get('user')}}
        </button>
        </div>
    <div class="dropdown-menu" aria-labelledby="">
        <a class="dropdown-item" href="#">profile <span class="glyphicon glyphicon-star ml-4" aria-hidden="true"></span</a>
        <a class="dropdown-item" href="\logout">logout <span class="glyphicon glyphicon-logout ml-4" aria-hidden="true"></span</a>
     </div>
</div>
</ul>
@else
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
  login
</button>
@endif  
    </ul>
  </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login To Your Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="userLogin">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{ old('password') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2 offset-md-9">
                            
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                         <hr >   


                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#registermodal">
                        regster
                        </button>

                    </form>
      </div>
     
    </div>
  </div>
</div>



