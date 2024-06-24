<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Railway Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

        if($_POST['station_name'] && $_POST['arr_station_name']){
            $station_name = $_POST['station_name'];
            $arr_station_name = $_POST['arr_station_name'];
            $select_qry = "SELECT * FROM train_info WHERE station_name LIKE '%$station_name%' && arr_station_name LIKE '%$arr_station_name%'";
            $result = mysqli_query($db_connection, $select_qry)  or die("Fetch Error");;
            $dbRows = mysqli_fetch_array($result);
        
        
    ?>
    <div class="navBar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid mx-4">
                <a class="navbar-brand" href="index.php">
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

    <div class="tableSection my-5">
        <div class="container table-center">
            <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
            <thead class="">
                <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Train Name</th>
                <th scope="col">Deperture Station Name</th>
                <th scope="col">Deperture Time</th>
                <th scope="col">Arrival Station Name</th>
                <th scope="col">Arrival Time</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                    
                    while ($trains_row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="text-center">
                    <th scope="row"><?php echo $trains_row['id'] ?></th>
                    <td><?= $trains_row['train_name']?></td>
                    <td><?php echo $trains_row['station_name']?></td>
                    <td><?php echo $trains_row['train_time']?></td>
                    <td><?php echo $trains_row['arr_station_name']?></td>
                    <td><?php echo $trains_row['arr_train_time']?></td>
                    <td class="">
                        <a class="btn btn-warning" href="entryform.php" role="button">Add</a>
                        <a class="btn btn-success" href="edit.php?id=<?php echo $trains_row['id'] ?>" role="button">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $trains_row['id'] ?>" role="button">Delete</a>
                    </td>
                    </tr>
                 <?php } ?>
            </tbody>
        </table>
            </div>
        </div>
    </div>   
<?php } ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ecf8211025.js" crossorigin="anonymous"></script>
</body>

</html>