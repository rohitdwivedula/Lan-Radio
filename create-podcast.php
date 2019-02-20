<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Upload & Create Podcast</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
   *{
    box-sizing:border-box;
  }
  body{
    font-family:Roboto,Arial;
    background: #ff5d5f;
  }
    .content,.header{
      margin:0 auto;
      padding:40px;
      width:800px;
      box-shadow:0px 0px 40px 0px rgba(0,0,0,0.7);
      background: white;
      margin-top:50px;
      margin-bottom: 50px;
      max-width: 95%;
    }
    .header{

    }
    .red{
      color:#ff5d5f;
    }
    .form-group{
      padding:30px;
      margin-bottom:20px;
      background: whitesmoke;
    }
    
  </style>
</head>
<body>

<div class="content container">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
      <h1>Podcast Creation</h1>
      <small class="red">System created by Divyanshu Agrawal. In case of errors, contact via facebook or call 9521738499</small>
    	<p >Logged in as <strong><?php echo $_SESSION['username']; ?></strong></p>
    	
    	
    	 <form method="POST" action="insert_details.php" enctype="multipart/form-data">
                           <div class="form-group">
                                <label for="fullname">Podcast name ( Album Name ) should be something searchable such as 'Arena 2018 Interview' or 'Bitch Lasagna'</label>
                                  <input autocomplete="none" type="text" class="form-control" id="fullname" name="fullname" placeholder="Podcast Name" required>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">  
                              <label for="artist">Example 'PewDiePie' or 'Suraj Thotakura'</label>            
                                  <input autocomplete="none" type="text" class="form-control" id="artist" name="artist" placeholder="Artist" required>
                                  <span class="help-block"></span>
                              </div>	
			     <div class="form-group"> 
           <label for="exampleFormControlInput1">Describbe what the content is about in about 50-60 words or lesser.</label>                            
                                  <textarea  cols="30" rows="3" type="text" class="form-control" id="description" name="description" value="" placeholder="Enter Description here" required></textarea>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group"> 
                              <label for="image">Upload The Podcast Album Art. <b class="red">Make sure the album art is Square shaped.</b> Can be hi-res also. Allowed: .JPG, .JPEG, .PNG, .WEBM</label>   
                              <input autocomplete="none" type="file" name="image" class="form-control-file" accept=".png,.jpg,.jpeg,.gif,.webm" required>				
                             
                              </div> 

                              <div class="form-group">
                                <input autocomplete="none" type="submit" value="Submit & Create Podcast" class="btn btn-secondary btn-bg" >
                              </div> 
      </form>
    	
    	
    	
    	
    	
    	
    	
    	
    <?php endif ?>
</div>
		
</body>
</html>