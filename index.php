<?php
session_start();

if (isset($_SESSION['user'])) {
	header('Location:view/hello.phtml');
} else {
	header('Location:view/connection.phtml');
}