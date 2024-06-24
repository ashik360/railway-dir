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
                                <a class="nav-link active" href="entryform.php">Add New Entry</a>
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
        $stations_details = array(
            array('stations_name' => 'Dhaka', 'stations_time' => '02:45'),
            array('stations_name' => 'Biman_Bandar', 'stations_time' => '08:07'),
            array('stations_name' => 'Bhairab_Bazar', 'stations_time' => '09:16'),
            array('stations_name' => 'Brahmanbaria', 'stations_time' => '09:39'),
            array('stations_name' => 'Akhaura', 'stations_time' => '10:05'),
            array('stations_name' => 'Cumilla', 'stations_time' => '10:51'),
            array('stations_name' => 'Feni', 'stations_time' => '12:00'),
            array('stations_name' => 'Chattogram', 'stations_time' => '13:30'),
        );
        if (isset($_POST['from']) && isset($_POST['to'])) {
            $from = $_POST['from'];
            $to = $_POST['to'];

            $select_query = "SELECT * FROM train_info WHERE station_name LIKE '%$from%' AND arr_station_name LIKE '%$to%'";
            $trains = mysqli_query($db_connection, $select_query) or die("Select Query Faild");
            $result = mysqli_num_rows($trains);
            if ($result > 0) {
                foreach ($trains as $trains_row) {


                    ?>
                    <!--  -->
                    <div class="container-fluid">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-8">
                                <div class="list-group">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn trans-bg" data-bs-toggle="modal"
                                        data-bs-target="#statusSuccessModal">
                                        <div class="card">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-flex flex-column align-items-center justify-content-center">
                                                    <div class="row-0">
                                                        <h3>
                                                            <?php echo $trains_row['station_name']; ?>
                                                        </h3>
                                                    </div>
                                                    <div class="row-1"><i class="fa-solid fa-clock"></i></div>
                                                    <div class="row-2">
                                                        <h3>
                                                            <?php echo $trains_row['train_time']; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card text-center">
                                                        <div class="card-header">
                                                            Train Details
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title">
                                                                <?php echo $trains_row['train_name']; ?>
                                                            </h5>
                                                            <a href="#" class="btn btn-primary">
                                                                <?php

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

                                                                // Convert seconds to hours and minutes
                                                                $elapsed_hours = floor($difference_seconds / 3600); // 3600 seconds in an hour
                                                                $elapsed_minutes = ($difference_seconds % 3600) / 60; // Remaining minutes
                                                    
                                                                // Output the elapsed time in hours and minutes format
                                                                echo "Elapsed Time: ";
                                                                if ($elapsed_hours > 0) {
                                                                    echo $elapsed_hours . " hours ";
                                                                }
                                                                echo $elapsed_minutes . " minutes";

                                                                ?>
                                                            </a>
                                                        </div>
                                                        <div class="card-footer text-body-secondary">
                                                            Intercity
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 d-flex flex-column align-items-center justify-content-center">
                                                    <div class="row-0">
                                                        <h3>
                                                            <?php echo $trains_row['arr_station_name']; ?>
                                                        </h3>
                                                    </div>
                                                    <div class="row-1"><i class="fa-solid fa-clock"></i></div>
                                                    <div class="row-2">
                                                        <h3>
                                                            <?php echo $trains_row['arr_train_time']; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <!-- <div class="modal fade modal-dialog modal-dialog-centered modal-dialog-scrollable"
                            id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Train Stations</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        NEW COMMENT START <div class="station">
                                            <span>Station A</span>
                                        </div>
                                        <div class="station">
                                            <span>Station B</span>
                                        </div> NEW COMMENT END
                                        <div class="station mb-4">
                                            <span>Station A</span>
                                        </div>
                                        <div class="arrow mt-2"></div>
                                        <div class="station station-B">
                                            <span>Station B</span>
                                        </div>
                                        <div class="arrow mt-2 mb-2"></div>
                                        <div class="station mb-4">
                                            <span>Station C</span>
                                        </div>
                                        <div class="arrow mt-2"></div>
                                        <div class="station">
                                            <span>Station D</span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <div class="modal fade" id="statusSuccessModal" tabindex="-1" role="dialog" data-bs-backdrop="static"
                        data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Train Stations</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- NEW COMMENT START <div class="station">
                                            <span>Station A</span>
                                        </div>
                                        <div class="station">
                                            <span>Station B</span>
                                        </div> NEW COMMENT END -->
                                    <?php
                                    foreach ($stations_details as $st) { ?>
                                        <div class="station mb-4 d-flex justify-content-between">
                                            <span class="mx-5"><?php echo $st['stations_name'];?></span>
                                            <span class="mx-5"><?php echo $st['stations_time'];?></span>
                                        </div>
                                        <div class="arrow mt-2">
                                        <!-- <i class="fa-solid fa-up-down"></i> -->
                                        </div>
                                    <?php }
                                    ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }

            } else {
                echo "
                        <i class='d-block fa-solid fa-triangle-exclamation fa-x-big text-center text-danger'></i>
                        <h1 class=text-danger>No Data Available In DB</h1>";
            }
        } else {
            echo "
            <h1 class=text-danger>No Data Found</h1>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ecf8211025.js" crossorigin="anonymous"></script>
</body>

</html>