<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<body>
 
 
</main>
  <div class="wrapper">

    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
           <span><?php echo $row['fname']. " " . $row['lname']." "?></span>
           <span class="id"><?php echo "Id:".$row['unique_id']?></span>
           <style>
   .id{
     color: blue;
   }
   </style>
           <p><?php echo $row['status']; ?></p>
           
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="search text Id or name">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
      
      </div>
    </section>
  </div> 

</div>
<script src="javascript/users.js"></script>


</body>
</html>
