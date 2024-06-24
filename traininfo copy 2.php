<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Train From Location To Location</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- PHP START -->
    <!-- // $train_name = ['Mohongonj Express','Jamuna Express','Bharammaputra Express','Hawor Express','Tista Express'];
    // $train_time = ['2:45','4.40','9:05','10:45','5:10'];
    // var_dump($train_name);  
    // var_dump($train_time);
    // $train_details = array(
    //     array('train_name' => 'Mohongonj Express','train_time' => '02:45'),
    //     array('train_name' => 'Jamuna Express','train_time' => '04:40'),
    //     array('train_name' => 'Bharammaputra Express','train_time' => '09:05'),
    //     array('train_name' => 'Hawor Express','train_time' => '10:45'),
    //     array('train_name' => 'Tista Express','train_time' => '05:10')
    // );
    // foreach ($train_details as $details){
    //     // var_dump($details);
    //     echo $details['train_name'];
    //     echo "<br>";
    // }
    // var_dump($train_details); -->
      <!-- PHP END -->
 
    <div class="navBar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid mx-4">
                <a class="navbar-brand" href="index.php">
                    <i class="fa-solid fa-train"></i>
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
    <div class="trainList mt-5 mb-5">
            <?php
            if (isset($_POST['from']) && isset($_POST['to'])) {
                $from = $_POST['from'];
                $to = $_POST['to'];

                $select_query = "SELECT * FROM train_info WHERE station_name LIKE '%$from%' AND arr_station_name LIKE '%$to%'";
                $trains = mysqli_query ($db_connection, $select_query) or die("Select Query Faild");
                foreach ($trains as $trains_row){
            
                
            ?>
        <!--  -->
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="list-group">

                    <!-- Button trigger modal -->
                        <button type="button" class="btn trans-bg" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-3 d-flex flex-column align-items-center justify-content-center">
                                        <div class="row-0"><h3><?php echo $trains_row['station_name'];?></h3></div>
                                        <div class="row-1"><i class="fa-solid fa-clock"></i></div>
                                        <div class="row-2"><h3><?php echo $trains_row['train_time'];?></h3></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card text-center">
                                            <div class="card-header">
                                                Train Details
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $trains_row['train_name'];?></h5>
                                                <a href="#" class="btn btn-primary"><?php 
                                                
                                                    // Example train time fetched from the database
                                                    $departure_time = $trains_row['train_time'];
                                                    $arrival_time = $trains_row['arr_train_time'];

                                                    // Convert departure and arrival times to Unix timestamps
                                                    $departure_timestamp = strtotime($departure_time);
                                                    $arrival_timestamp = strtotime($arrival_time);

                                                    // Check if arrival time is on the next day
                                                    if ($arrival_timestamp < $departure_timestamp) {
                                                        // Arrival time is on the next day, add one day (86400 seconds) to the arrival timestamp
                                                        $arrival_timestamp += 86400; // 86400 seconds in a day
                                                    }

                                                    // Calculate the difference in seconds
                                                    $difference_seconds = $arrival_timestamp - $departure_timestamp;

                                                    // Convert seconds to hours (3600 seconds in an hour)
                                                    $elapsed_hours_decimal = $difference_seconds / 3600;

                                                    // Output the elapsed time in decimal hour format
                                                    echo "Elapsed Time:<b> " . number_format($elapsed_hours_decimal, 1) . " </b>hours";
                                                
                                                ?></a>
                                            </div>
                                            <div class="card-footer text-body-secondary">
                                                Intercity
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex flex-column align-items-center justify-content-center">
                                        <div class="row-0"><h3><?php echo $trains_row['arr_station_name'];?></h3></div>
                                        <div class="row-1"><i class="fa-solid fa-clock"></i></div>
                                        <div class="row-2"><h3><?php echo $trains_row['arr_train_time'];?></h3></div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php }}
        else{
            echo " $to";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ecf8211025.js" crossorigin="anonymous"></script>
</body>
</html>