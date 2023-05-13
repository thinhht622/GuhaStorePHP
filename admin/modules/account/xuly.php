<?php
    include('../../config/config.php');
    $category_id = $_GET['category_id'];
    $category_name = $_POST['category_name'];
    $category_keyword = $_POST['category_keyword'];
    $category_description = $_POST['category_description'];
    $category_image = $_FILES['category_image']['name'];
    $category_image_tmp = $_FILES['category_image']['tmp_name'];
    $category_image = $_FILES['category_image']['name'];