<?php
$ques = $_POST['ques'];
$a_option = $_POST['a_option'];
$b_option = $_POST['b_option'];
$c_option = $_POST['c_option'];
$d_option = $_POST['d_option'];
$correct_answer = $_POST['correct_answer'];

if (!empty($ques) || !empty($a_option) || !empty($b_option) || !empty($c_option) || !empty($d_option)) {

  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "admin";

  //create connection
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  }

  else {
  $INSERT = "INSERT Into question (ques, a_option, b_option, c_option, d_option, correct_answer) values(?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($INSERT);
  $stmt->bind_param("ssssss", $ques, $a_option, $b_option, $c_option, $d_option, $correct_answer);
  $stmt->execute();
  echo "New record inserted sucessfully";
  }

 $stmt->close();
 $conn->close();
}

else {
  echo "All field are required";
  die();
}

?>