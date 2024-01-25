<?php include 'inc/header.php' ?>

<?php 
$sql = 'SELECT * FROM feecback' ;
$result = mysqli_query($connect , $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

    <h2>What the clients say</h2>

    <?php if(empty($feedback)): ?>
    <p class='lead mt-3'>There are no feedbacks currently</p>
    <?php endif ?>

    <?php 
    foreach($feedback as $item) :  ?>
    <div class="card my-3 w-75">
     <div class="card-body text-center h4">
       <?php echo $item['body']; ?>
       <div class="text-secondary mt-2 h5">
        By <?php echo $item['name']; ?> 
       </div>
       <div class="text-secondary mt3 h6">
       <?php echo $item['email'] ?>
       </div>
     </div>
   </div>
   <?php endforeach; ?>
   
   <?php include 'inc/footer.php' ?>
