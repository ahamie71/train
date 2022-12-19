<?php
session_start();

include("view/nav.phtml");

if (isset($_POST['valider'])) {


  if (isset($_POST['name']) && isset($_POST['password'])) {

    $name = $_POST['name'];

    $password = $_POST['password'];

    $error = "";

    try {
      $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
    }

    $sql = "SELECT * FROM  user WHERE name = '$name' AND  password = '$password'";

    $userStatement = $db->prepare($sql);

    $userStatement->execute();

    $user = $userStatement->fetch();
    if ($user != false) {

      $_SESSION["user"] = $user;

      header("location:view/hello.phtml");
      var_dump("Welcome");
    } else {
      var_dump("hello");

      $error = "sorry its not possible to login verify your name and your password";
    }

  }

}
include("view/connection.phtml");