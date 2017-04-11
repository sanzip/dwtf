<html>
<title></title>
<head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'> -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/dwtf.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<style>
.card.hovercard{
  position: relative;
    padding-top: 50px;
    overflow: hidden;
    text-align: center;
    background-color: rgba(214, 224, 226, 0.2);
}
    .feature {
        display: block;
        width: 100%;
        margin: 0;
    }

    .author {
        font-style: italic;
        line-height: 1.3;
        color: #aab6aa;
        font-size: 15px;
    }

    .blog-stripe .block-title {
        background: black;
        width: 100%;
        color: white;
        height: 100px;
        padding-top: 20px;
    }

    .all-blogs .media {
        margin-left: -40px;
        padding-bottom: 20px;
        border-bottom: 1px solid #CCCCCC;
    }
</style>
</head>
<body>
 <?php
  session_start();
if(!isset($_SESSION['login_user'])){
   header("location:index.php");
}
  ?>
      <header class="main__header">
  <div class="container">
    <nav class="navbar navbar-default" role="navigation"> 
      <!-- Brand and toggle get grouped for better mobile display --> 
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="navbar-header">
        <h1 class="navbar-brand"><a href="dashboard.php">Deerwalk Teaching Fellowship(DWTF)</a></h1>
     
   </div>
    <div class="menuBar">
        <ul class="menu">
          <li><a href="index.php">Logout</a></li>
         
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </nav>
  </div>
</header>
<br>
<br>
<br>
 
<div class="container">
    <div class="row">
        <?php
        require('db_connection.php');
      $sql = "SELECT * from reports a inner join users b  on a.user_id=b.user_id";
      $result =pg_query($conn,$sql) ;
    if (pg_num_rows($result) > 0){
        $data = array();
        $i = 0;
        while($res = pg_fetch_assoc($result))
        {
            $data[$i]['report_id'] = $res["report_id"];
            $data[$i]['user_id'] = $res["user_id"];
            $data[$i]['username'] = $res["username"];
            $data[$i]['title'] = $res["title"];
             $data[$i]['body'] = $res["body"];
              $data[$i]['class_taught']=$res["class_taught"];
               $data[$i]['hours_taught']=$res["hours_taught"];
                $data[$i]['date']=$res["date"];
              $data[$i]['image']=$res["image"];
         
        
        
      ?>
        <div class="col-md-12 col-lg-12">
            <ul class="all-blogs">
                <li class="media">
                    <a class="pull-left" href="#">
                       <div class="card hovercard">
                 <!--        <div class="cardheader">

                </div> -->
                      <div class="avatar">
                      <?php echo '<img src="data:image/jpeg;base64,'. pg_unescape_bytea($data[$i]['image']). ' " />';?> 
                        <!-- <img src="http://placehold.it/200x100" alt="..."> -->
                   </div>
                 </div>
                    </a>
                    <div class="media-body">
                      <a  href="reportdetail.php?id='<?php echo  $data[$i]['report_id']?>'">
                        <h4 class="media-heading"><?php echo  $data[$i]['title']?></h4>
                      </a >
                        <p class="author"><?php echo  $data[$i]['username']?></p>
                        <p class="author"><?php echo  $data[$i]['date']?></p>
                    </div>
                    <div>
                  <!-- <button class="btn btn-success ">View</button> -->
                    </div>
                </li>
             <!--    <li class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/200x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Newest bootstrap version</h4>
                        <p class="author">Dave Hesler</p>
                    </div>
                </li>
                <li class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/200x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Android rolls our another update</h4>
                        <p class="author">Michael Davis</p>
                    </div>
                </li>
                <li class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/200x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Survey results are out</h4>
                        <p class="author">Mike Smith</p>
                    </div>
                </li> -->
            </ul>
        </div>
        <?php
      }

            $i++;
    }
      ?>
    </div>
</div>


<script type="text/javascript" src="js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script> 
</body>
</html>