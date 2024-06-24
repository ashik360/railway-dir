    <!-- echo "this is edit page";
    echo "<br>";
    echo $_GET['id'];
    $db_connection = mysqli_connect("localhost", "root", "", "railway") or die("Failed");

    UPDATE `train_info` SET `train_name`='[value-2]',`station_name`='[value-3]',`train_time`='[value-4]' WHERE 1
    $update_qry = UPDATE  -->
<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navBar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid mx-4">
                <a class="navbar-brand" href="#">
                    <i class="fa-solid fa-train"></i>
                    <!-- <img src="images/bangladesh-railway.png" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top"> -->
                    Railway Directory
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <div class="mediaFend">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Login</a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Register</a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="traininfo.php">Train Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="trainlist.php">List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!--============================================ Entry Form Starts ============================================-->

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <!-- Credit card form tabs -->
                <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-card" class="nv-success nav-link active rounded-pill">
                                        <i class="fa fa-credit-card"></i>
                                        Update Data
                                    </a>
                </li>
                </ul>
                <!-- End -->


                <!-- Credit card form content -->
                <div class="tab-content">

                <!-- credit card info-->
                <div id="nav-tab-card" class="tab-pane fade show active">
                    <!-- <p class="alert alert-success">Some text success or error</p> -->
                    <form id="p_form" method="post" action="update.php?id=<?php echo $_GET['id']?>">
                        <?php
                            $id= $_GET['id'];
                            
                            $select_qry = "SELECT * FROM train_info WHERE id='{$id}'";
                            $single_data = mysqli_query($db_connection, $select_qry) or die("Select Query Failed!");
                            foreach ($single_data as $single_train) {
                        ?>
                        <div class="form-group my-2">
                            <label for="username"><b>Train Name</b></label>
                            <input type="text" class="form-control" id="train_name" name="train_name" placeholder="Mohanagar Express" value="<?php echo $single_train['train_name']?>" required class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="username"><b>Deperture Station Name</b></label>
                            <input type="text" class="form-control" id="station_name" name="station_name" placeholder="Dhaka" value="<?php echo $single_train['station_name']?>" required class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="username"><b class="text-success">Train Deperture Time</b></label>
                            <input type="text" class="form-control" id="train_time" name="train_time" placeholder="14:30" value="<?php echo $single_train['train_time']?>" required class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="username"><b>Arrival Station Name</b></label>
                            <input type="text" class="form-control" id="arr_station_name" name="arr_station_name" placeholder="Dhaka" value="<?php echo $single_train['arr_station_name']?>" required class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="username"><b class="text-danger">Train Arrival Time</b></label>
                            <input type="text" class="form-control" id="arr_train_time" name="arr_train_time" placeholder="14:30" value="<?php echo $single_train['arr_train_time']?>" required class="form-control">
                        </div>
                        <?php } ?>
                        <div>
                            
                            <button class="btn btn-primary rounded shadow-sm my-3" type="submit">Update Info</button>
                            
                        </div>
                    </form>
                </div>
                <!-- End -->

                <!-- Paypal info -->
                <div id="nav-tab-paypal" class="tab-pane fade text-center">
                    <h2>Under Construction!!</h2>
                </div>
                <!-- End -->
                </div>
                <!-- End -->

            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.1.0/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ecf8211025.js" crossorigin="anonymous"></script>
</body>
</html>

