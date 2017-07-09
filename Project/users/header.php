<?php ?>

<nav class="navbar navbar-inverse navbar-fixed top" id=my-navbar  style="background-color: #5BC8AC;">

     <div class="container" style="background-color: #4CB5F5;">

      <div class="navbar-header" id="nav-main">

       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=#navbar-collapse>

         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>

       </button>

       <a href="index.php" class="navbar-brand" ><img id="logo" src="img/logo.png"  "></a>


     </div>

     <div class="collpase navbar-collapse" id="navbar-collapse" >

      <div class="nav navbar-nav navbar-right" style="color: #fff; padding-top: 5px;" >



        <ul id="nav">
          <li><a href="index.php">Home</a></li>
          <?php
          $res=$mysqli->query("SELECT * FROM main_menu");
          while($row=$res->fetch_array())
          {
           ?>
           <li><a href="<?php echo $row['m_menu_link']; ?>"><?php echo $row['m_menu_name']; ?></a>
             <?php
             $res_pro=$mysqli->query("SELECT * FROM sub_menu WHERE m_menu_id=".$row['m_menu_id']);
             ?>
             <ul>
              <?php
              while($pro_row=$res_pro->fetch_array())
              {
               ?><li><a href="<?php echo $pro_row['s_menu_link']; ?>"><?php echo $pro_row['s_menu_name']; ?></a></li><?php
             }
             ?>
           </ul>
         </li>

         <?php
       }
       ?>  


      <li><a href="register.php">Sign UP</a></li>
      <li><a href="login.php">Login</a></li>
       
     
         
           


           
         </div>

       </div>
     </li>
   </ul>

  </div>

  </div>

  </div>

  </nav>