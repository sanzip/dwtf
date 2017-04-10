<html>
<title></title>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
<!-- <link href="css/style.css" rel="stylesheet"> -->
<style type="text/css">
body { 
  background: url(img/classof16.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.panel-default {
opacity: 0.9;
margin-top:100px;
}
.form-group.last { margin-bottom:0px; }</style>
</head>
<body>
   <div class="container">
    <div class="row vertical-offset-100">
      <div class=" col-xs-6 col-md-4 col-md-offset-4">
        
                <div class="panel panel-default"> 
          <div class="panel-heading">
            <h3 class="panel-title">Please sign in</h3>
        </div>
         <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                  <img src="img/dwit.jpg">
                </div>
                     </div>
          <div class="panel-body">
           <form method="post" action="login_form_action.php">
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="email" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <div class="checkbox">
                
                </div>
              <input class="btn btn-lg btn-success btn-block" name="btn_login" type="submit" value="Login">
            </fieldset>
              </form>
          </div>
      </div> 

       
        <!-- <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Please sign in</h3>
        </div>
          <div class="panel-body">
           <form method="post" action="login_form_action.php">
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="email" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <div class="checkbox">
                
                </div>
              <input class="btn btn-lg btn-success btn-block" name="btn_login" type="submit" value="Login">
            </fieldset>
              </form>
          </div>
      </div> -->
    </div>
  </div>
</div>
</body>
</html>