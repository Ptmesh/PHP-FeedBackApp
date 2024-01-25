<?php include 'inc/header.php' ; ?>

<?php 
 $name = $email = $body = '';
 $nameError=$emailError=$bodyError= ''; 

//  Submitting form
if (isset($_POST['submit'])) {
  if(empty($_POST['name'])){
    $nameError = 'Name is required';
  }else{
    $name = filter_input(INPUT_POST , 'name' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if(empty($_POST['email'])){
    $emailError = 'Email is required';
  }else{
    $email = filter_input(INPUT_POST , 'email' , FILTER_SANITIZE_EMAIL);
  }
  if(empty($_POST['body'])){
    $bodyError = 'Feedback is required';
  }else{
    $body = filter_input(INPUT_POST , 'body' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if(empty($nameError) && empty($emailError) && empty($bodyError)){
    // Add to db
    $sql = "INSERT INTO feecback (name , email , body) VALUES ('$name', '$email' , '$body')";

    if(mysqli_query($connect , $sql))
    {
      // Successful
      header('Location: feedback.php');
    }
    else{
      // Error :-(
      echo 'Error: '. mysqli_error($connect);
    }
  }
}

?>
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for Prathmesh Takalkar</p>
    <form action="" class="mt-4 w-75" method='POST' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo !$nameError ?: 'is-invalid'; ?>  " id="name" name="name" placeholder="Enter your name">
        <div class="invalid-feedback">
          <?php echo $nameError; ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo !$emailError ?: 'is-invalid'  ; ?>" id="email" name="email" placeholder="Enter your email">
        <div class="invalid-feedback">
          <?php echo $emailError; ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo !$bodyError ?: 'is-invalid'; ?> " id="body" name="body" placeholder="Enter your feedback"></textarea>
        <div class="invalid-feedback">
          <?php echo $bodyError; ?>
        </div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
<?php include 'inc/footer.php';?>