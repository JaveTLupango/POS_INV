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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Post Create &mdash; CodiePie</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">
</head>

<body class="layout-3">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>
        <?php
            include 'view/partial/nav.pos.php';
        ?>

        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <div class="section-header-back">
                        <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Create New Product</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item">Create New Product</div>
                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">Create New Product</h2>
                    <p class="section-lead">On this page you can create a new post and fill in all fields.</p>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Product Details</h4>
                                </div>
                                <form method="POST">
                                <?php
                                if (isset($_POST["AddProduct"]))
                                {
                                    $name = $_POST["name"];
                                    $details = $_POST["details"];
                                    $price = $_POST["price"];
                                    $image = $_POST["upload_file"];
                                    
                                    $now = new DateTime();
                                    $dt = $now->format('Y-m-d H:i:s');
                                    $dt1 = $now->format('m-Y-d H:i:s');
                                    $dt2 = $now->format('d-m-Y H:i:s');
                                    $dttime = $now->format('Y-m-d H:i:s');
                                    $id = "PDT".round($dt).round($dt1).round($dt2).round(microtime(true));

                                    $q = "INSERT INTO product (productid, productname, product_description, status, photo, price) 
                                        VALUES('$id', '$name', '$details', '1', '$image', '$price')";

                                    $res = $c_Del->deleteRecord($conn, $q);

                                    echo '<center><button type="button" class="btn btn-success">'.$res.'</button>
</center>';
                                }

                                ?>
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Discription</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple" name="details"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Price</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" name="price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" onchange="validatePicture(this);" id="image-upload" />
                                            </div>
                                        </div>
                                    </div>
                                    <textarea id="imagehash" name="upload_file" hidden></textarea>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" name="AddProduct" class="btn btn-primary">Add Product</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php

            include 'view/partial/footer.pos.php';
        ?>
    </div>
</div>

<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="f/js/CodiePie.js"></script>

<!-- JS Libraies -->

<script src="assets/modules/summernote/summernote-bs4.js"></script>
<script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<!-- Page Specific JS File -->
<script src="f/js/page/features-post-create.js"></script>

<!-- Template JS File -->
<script src="f/js/scripts.js"></script>
<script src="f/js/custom.js"></script>
<script type="text/javascript">
    function validatePicture(element)
    {
        debugger;
        var file = element.files[0];
        var reader = new FileReader();
        reader.onloadend = function() {
          console.log('RESULT', reader.result)
          //$('#stringtypeImage').HTML(reader.result) // = reader.result;
          document.getElementById('imagehash').innerText =  reader.result;
        }
        reader.readAsDataURL(file);
        document.getElementById('imagehash').innerText =  reader.result;
    }

</script>
</body>
</html>