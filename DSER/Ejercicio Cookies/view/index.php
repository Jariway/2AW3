<?php include '../controller/indexController.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>myGoogle</title>
    </head>
    <body>
  
         <img src="http://www.colemancbx.com/wp-content/uploads/2015/09/Logo-Google.jpg" width="300" height="150"alt="google"> 
        <form action="../controller/searchController.php" method="GET">
            
           <input type="text" name="inSearch" />
           <input type="submit" value="search" />
            
        </form>  
        <br>
    <img src='<?php echo "$imageUrl";?>'  width="225" height="170"alt="ad"> <!-- here we load the advertisement-->

</html>   
