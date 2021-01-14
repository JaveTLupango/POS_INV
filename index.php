<?php
    session_start();

include 'configuration/connection.php'; //connection
include 'controller/InsertController.php'; // insertion Controller
include 'controller/AuthController.php'; // Auth Controller
require 'controller/SelectController.php'; // Select Controller
require 'controller/FuncController.php'; // Function Controller
require 'controller/EmailController.php'; // Function Controller
require 'controller/DeleteController.php'; // Function Controller

$c_Del = new Delete_Controller(); // Delete controller declarati0n
$c_con = new ClassConnection(); // connection declaration
$c_InsertControl = new Insert_Controller(); // Insertion controller declaration
$c_Auth = new Auth_Controller(); // Auth controller Decleration
$c_Select = new Select_Controller(); // Select controller declaration
$c_Func = new Func_Controller(); // Select controller declaration
$c_email = new Email_Controller(); // Delete controller declarati0n
$conn = $c_con->f_connection();

$orderid = $c_Func->ordervalidation_id($conn, $c_Select, $c_InsertControl);
$_SESSION["orderid"] = $orderid;
include 'view/partial/head.pos.php';

    echo '<body class="layout-3">
            <div class="page-loader-wrapper">
                <span class="loader"><span class="loader-inner"></span></span>
            </div>

            <div id="app">
                <div class="main-wrapper container">
                    <div class="navbar-bg"></div>';

            include 'view/partial/nav.pos.php';
            include 'view/body/body.pos2.php';
            include 'view/partial/footer.pos.php';

    echo '</div>
        </div>';

            include 'view/partial/js.pos.php';
?>
