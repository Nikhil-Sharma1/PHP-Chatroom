<?php
  session_start();
  if(!isset($_SESSION['unique_id']))
  {
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Realtime Chatting</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudFlare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
      <?php
        include_once "php/config.php";
        $user_id=mysqli_real_escape_string($conn,$_GET['user_id']);//escape special character
        //echo $user_id;                                             //$_GET collect data sent in the url
        $sql=mysqli_query($conn,"SELECT * FROM users WHERE unique_id={$user_id}");
        if(mysqli_num_rows($sql)>0)
        {
          $row=mysqli_fetch_assoc($sql);
        }
      ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']." ".$row['lname']; ?></span>
            <p><?php echo $row['status'] ?></p>
            <div class="File-content" id="Folder-content" >
          <span class="fa-stack w3-animate-bottom fa-2x">
            <label for="Image-file" class="btn1" style="cursor: pointer;"><i class="fas fa-circle fa-stack-2x"></i>
            <i class="fas fa-images fa-stack-1x fa-inverse"></i></label>
            <input id="Image-file" style="visibility:hidden;" type="file"  > </input>
          </span>
          <span class="fa-stack w3-animate-bottom fa-2x">
            <label for="Video-file" class="btn1" style="cursor: pointer;"><i class="fas fa-circle fa-stack-2x"></i>
            <i class="fas fa-video fa-stack-1x fa-inverse"></i></label>
            <input id="Video-file" style="visibility:hidden;" type="file"  > </input>
          </span>
          <span class="fa-stack w3-animate-bottom fa-2x">
            <label for="Audio-file" class="btn1" style="cursor: pointer;"><i class="fas fa-circle fa-stack-2x"></i>
            <i class="fas fa-music fa-stack-1x fa-inverse"></i></label>
            <input id="Audio-file" style="visibility:hidden;" type="file"  > </input> 
          </span>
        </div>
          </div>
      </header>
      <div class="chat-box">
      </div>
      <form action="#"class="typing-area" autocomplete="off">
        <div class="Files" >
            <i class="far fa-3x fa-folder" id="folder"></i>
        </div>
        <input type="text" name="outgoing_id" value=<?php echo $_SESSION['unique_id'];?> hidden>
        <input type="text" name="incoming_id" value=<?php echo $user_id;?> hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here...">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="javascript/chat.js"></script>
</body>
</html>