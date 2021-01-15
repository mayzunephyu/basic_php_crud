<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>basic php crud</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">  <style type="test/css">
    body{
     padding: 50px;
 }
</style>

</head>

<body>

<?php

require "connect.php";

$titleError="";
$descriptionError="";
$title="";
$desc="";

if(isset($_POST['create_post_button'])){
    $title = $_POST['title'];
    $desc = $_POST['description'];

   if(empty($title)){
     $titleError= "The title field is required";
   }
   if(empty($desc)){
    $descriptionError= "The description field is required";
  }

  if(!empty($title) && !empty($desc)){
    $query = "INSERT INTO posts(title,description) VALUES('$title','$desc')";
    mysqli_query($db, $query);
    $_SESSION['successMsg']="a post created successfully";
    header('location:index.php');

  }



}



?>


  <div class="container">
    <div class="row">
      <div class="col-md-12">


        <div class="card">
        <div class="card-header">
           <div class="row">
             <div class="col-md-6">            
             <div class="card-title">Posts Creation Form</div></div>
             <div class="col-md-6"><a href="index.php"  class="btn btn-secondary float-right"> Back</a></div>
           </div>
          </div>
          <form method="POST" action="post-create.php">
          <div class="card-body">
         
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control <?php if($titleError!=""):?>is-invalid<?php endif ?>" placeholder="Enter post title" value="<?php echo $title; ?>">
               <span class="text-danger">    <?php echo $titleError; ?></span>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control  <?php if($descriptionError!=""):?>is-invalid<?php endif ?>" name="description" placeholder="Description" ><?php echo $desc; ?></textarea>
                <span class="text-danger">    <?php echo $descriptionError; ?></span>
              </div>
            
          </div>
          <div class="card-footer"><button class="btn btn-primary" name="create_post_button" type="submit">Create</button></div>
        
          </form>
        </div>

      </div>

    </div>

  </div>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script></body>

</html>