<?php
  include'db_connect.php';
  session_start();

  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Polyworld Services</title>
    <meta name="Description" content="Polyworld">
    <meta name="viewport" content="width:device-width" initial-scale="1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <!-- Latest compiled and minified JavaScript -->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  
  </head>

  <body  data-spy="scroll" data-target="#my-navbar" >

  <?php 
        include'header.php';
  ?>
  
  <?php 

  $sql = "SELECT * FROM slider";

  if($result =  $mysqli->query($sql))

  {

    if($result->num_rows > 0)
    {  

     ?>

     <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>

      </ol>

      <!-- Wrapper for Slides -->
      <div class="carousel-inner">

       <?php foreach ($result as $row) {?>

       <?php if ($row['active']==1) {?>

       <div class="item active">
        <!-- Set the first background image using inline CSS below. -->
        <div class="fill" ><img src="admin/<?php echo $row['image'];?>" ></div>
        <div class="carousel-caption">
          <h2><?php echo $row['caption'];?></h2>
        </div>
      </div>

      <?php }

      else if  ($row['active']==0)

      {

        ?>
        <div class="item">
          <!-- Set the second background image using inline CSS below. -->
          <div class="fill" ><img src="admin/<?php echo $row['image'];?>"  ></div>
          <div class="carousel-caption">
            <h2><?php echo $row['caption'];?></h2>
          </div>
        </div>

        <?php }?>

        <?php }?>

      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
      </a>

    </div>

    <?php
  }
  }

  ?>

  <div class="container">
   <section>

    <div class="section-header text-center">

      <?php 

      $res=$mysqli->query("SELECT * FROM service_title_dialog");
      while($row=$res->fetch_array())
      {

       ?>

       <h2 style="color: orange; font-size: 35px;"><?php echo $row['title']; ?> </h2>

       <p style="color: maroon; font-size: 25px; "> <?php echo $row['dialog']; ?> </p> 
     </div>


     <?php 
   }

   ?>


   <div class="row">

     <?php 

     $res=$mysqli->query("SELECT * FROM service");
     while($row=$res->fetch_array() )
     {

       ?>            

       <div class="col-md-4">

         <div id="service">

          <img id="service_image" src="admin/<?php echo $row['image'];?>" >

        </div>
        <div align="center" class="bg-success text-white" id="service_name"><?php echo $row['name']; ?></div>



        <footer id="footer_one"><?php    echo $row['detail'];        ?></footer>

      </div>

      <?php  

    }
    ?>
  </div>



  </section>

  </div>


  <div class="container" >

    <div class="row" id="Gallery">
      <h2><div class="col-md-12" style="color: maroon;">Gallary</div>

      </h2>
    </div>
  </div>



  <?php  include'footer.php'; ?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script type="text/javascript" src="js/custom.js"></script>

  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!-- Script to Activate the Carousel -->
  <script>
    $('.carousel').carousel({
                interval: 2000 //changes the speed
              })

            </script>

          </body>
          </html>