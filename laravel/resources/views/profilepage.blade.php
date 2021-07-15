<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Profile</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/profilepage.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>


<hr>
<div class="container bootstrap snippet">
  
    <div class="row">
  		<div class="col-sm-10"><h1>Edit Profile</h1></div>
    	<div class="col-sm-2"><a href="/" class="pull-right"><img title="Back to home page" class="img-circle img-responsive" src="../logoo.png"></a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              
          <div class="pic">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" onClick="triggerClick()" id="profileDisplay">
                <input hidden type="file" name="profileImage" value="" onChange="displayImage(this)" id="profileImage" class="form-control">
            </div> <p>Upload different photo</p>

     
               
          <div class="panel panel-default">
            <div class="panel-heading">Subject: <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Final Marks <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Mark1</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Mark2</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Mark3</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Mark4</strong></span> 78</li>
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Average</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i>344 <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Edit Profile</a></li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="" method="post" id="registrationForm">
                  @csrf
                      <div class="form-group">
                        
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4> <span style="color:red"> @error('first_name'){{$message}}@enderror</span></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4><span style="color:red"> @error('last_name'){{$message}}@enderror</span></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Telephone</h4><span style="color:red">@error('phone'){{$message}}@enderror</span></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter telephone" title="enter your telephone.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Email</h4><span style="color:red">@error('email'){{$message}}@enderror</span></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="subject"><h4>Subject</h4><span style="color:red">@error('subject'){{$message}}@enderror</span></label>
                              <input type="text" class="form-control" name="subject" id="subject" placeholder="enter subject" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="address"><h4>Address</h4><span style="color:red">@error('address'){{$message}}@enderror</span></label>
                              <input type="text" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4><span style="color:red">@error('password'){{$message}}@enderror</span></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4><span style="color:red">@error('password2'){{$message}}@enderror</span></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                   <button class="btn btn-lg" type="cancel"><i class="glyphicon glyphicon-cancel"></i> Cancel</button>
                            </div>
                      </div>
                	</form>
              <hr>
              
            </div>

        </div>
    </div>
<script>
    function triggerClick(e) {
        document.getElementById('profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e){
            document.getElementById('profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        }
    }
</script>
                                                      