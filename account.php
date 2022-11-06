<?php include_once('config.php');
include_once('./header.php');





if (isset($_SESSION['userEmail'])) {

  echo " Welcom back " . $_SESSION['userName'] . "<br>";
  echo " Your Email is : " . $_SESSION['userEmail'];
}

?>
<section>

  <img src="./assets/pictures/<?= $_SESSION['userPicture']; ?>" width="250px" alt="users picture">

</section>


<?php include_once('./footer.php'); ?>