@extends('layouts.auth')

@section('content')
<section class="login-block">
    <div class="container">
    <div class="row">
      <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">

       <?php
        $carousel_one = getSetting('carousel_one','login-settings');
        $carousel_two = getSetting('carousel_two','login-settings');
        $carousel_three = getSetting('carousel_three','login-settings');
        $login_logo = getSetting('login_logo','login-settings');
        ?>

      <img class="d-block img-fluid" src="{{ IMAGE_PATH_SETTINGS.$carousel_one }}" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>{{ getSetting('carousel_head_one','login-settings') }}</h2>
            <p>{{ getSetting('carousel_para_one','login-settings') }}</p>
        </div>  
  </div>
    </div>
    <div class="carousel-item">
     
      <img class="d-block img-fluid" src="{{ IMAGE_PATH_SETTINGS.$carousel_two }}" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>{{ getSetting('carousel_head_two','login-settings') }}</h2>
            <p style="overflow:hidden;">{{ getSetting('carousel_para_two','login-settings') }}</p>
        </div>  
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="{{ IMAGE_PATH_SETTINGS.$carousel_three }}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>{{ getSetting('carousel_head_three','login-settings') }}</h2>
            <!--<a href="#" class="btn btn-video float-left" data-toggle="modal" data-target="#myModal"><p class="text-up"><i class="material-icons">play_circle_outline</i>Watch Demo</p></a>-->
    
        </div>  
    </div>
  </div>
            </div>     
            
        </div>
    </div>
        


        <div class="col-md-4 login-sec">
         
            <h2 class="text-center">@lang('custom.app_sign_in')</h2>

            <?php
              $login_logo_enable = getSetting('login_logo_enable','login-settings');
              if($login_logo_enable === 'Yes'){
            ?>

             @if($login_logo && file_exists(getSettingsPath() . $login_logo))
            <p class="single-line"><img src="{{ IMAGE_PATH_SETTINGS.$login_logo }}"  height="56" width="180"></p>  
            @endif

              <?php
            } else {
             ?>

              <p class="single-line">{{ getSetting('site_title','site_settings') }}</p>   

           <?php }  ?>
          
                         @if (count($errors) > 0)
                        <div class="alert alert-danger">
                           <!--  <strong>@lang('quickadmin.qa_whoops')</strong> @lang('quickadmin.qa_there_were_problems_with_input'):
                            <br><br> -->
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (Session::has('message'))                        
                      <div class="alert alert-{{Session::get('status', 'info')}}">
                      &nbsp;&nbsp;&nbsp;<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('message') }}
                      </div>                    
                    @endif
                    

            <form class="login-form"
             role="form"
            method="POST"
            action="{{ url('login') }}"    
              >

              @csrf

              <div class="form-group">
         <label for="exampleInputEmail1">@lang('global.app_email')</label>
          <input type="email" 
          class="form-control"
          name="email"
          placeholder="Enter Email"
          value="{{ old('email') }}">   
     
           </div>


             <div class="form-group">
             <label for="exampleInputPassword1">@lang('global.app_password')</label>
             <input type="password" 
             class="form-control"
             name="password" 
             placeholder="Enter Your Password">
           </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" name="remember" class="form-check-input">
      <small>@lang('quickadmin.qa_remember_me')</small>
    </label>

    <button type="submit" class="btn btn-login float-right">@lang('global.app_login')</button>
  </div>

                  <div class="form-group">
                            <div class="exampleInputPassword1">
                                <a href="{{ route('auth.password.reset') }}" style="font-size: 14px;">@lang('global.app_forgot_password')</a>
                            </div>
                        </div>

  
        </form>

        </div>

 
   </div>


  
</div>


</section>
@endsection