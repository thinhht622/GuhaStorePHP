<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Guha Store</title>

  <!-- start css -->
  <link rel="stylesheet" href="./assets/css/helper.css" />
  <link rel="stylesheet" href="./assets/css/layout.css" />
  <link rel="stylesheet" href="./assets/css/main.css" />
  <link rel="stylesheet" href="./assets/css/responsive.css" />
  <link rel="stylesheet" href="./assets/css/login.css">
  <!-- end css -->

  <!-- start google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;700&display=swap" rel="stylesheet" />
  <!-- end google font -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
  <div id="wrapper">
    <?php
    session_start();
    include('admin/config/config.php');
    include("./pages/main.php");
    ?>
  </div>

  <script src="./assets/js/main.js"></script>
  <script src="./assets/js/navigation.js"></script>
  <script src="./assets/js/select-number.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>