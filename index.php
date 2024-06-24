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
    <!-- nav -->
    <section class="navBar">
        <div class="navBar">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid mx-4">
                    <a class="navbar-brand" href="#">
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
    </section>
    <!-- nav ends -->
    <secton class="formInput box left">
        <div class="input-Group mt-5">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 mt-5 mb-5 pt-5 pb-5">
                            <form class="row g-3" method="post" action="traininfo.php">
                                <div class="col-md-6">
                                    <label for="From city" class="form-label">From</label>
                                    <input type="text" name="from" class="form-control" id="inputFromCity" list="cities" required>
                                    <datalist id="cities">
                                        <option value="Dhaka">
                                        <option value="Chattogram">
                                        <option value="Sylhet">
                                        <option value="Khulna">
                                        <option value="Rajshahi">
                                        <option value="Dinajpur">
                                        <option value="Mirzapur">
                                        <option value="Mymensingh">
                                        <option value="Narayanganj">
                                        <option value="Gazipur">
                                        <option value="Gopalganj">
                                        <option value="Tangail">
                                        <option value="Bhairab Bazar">
                                        <option value="Faridpur">
                                        <option value="Chittagong">
                                        <option value="Cumilla">
                                        <option value="Brahmanbaria">
                                        <option value="Feni">
                                        <option value="Chandpur">
                                        <option value="Laksam">
                                        <option value="Akhaura">
                                        <option value="Nabinagar">
                                    </datalist>
                                </div>
                                <div class="col-md-6">
                                    <label for="To city" class="form-label">To</label>
                                    <input type="text" name="to" class="form-control mb-2" id="inputToCity" list="cities"
                                        required>
                                    <datalist id="cities">
                                        <option value="Dhaka">
                                        <option value="Chattogram">
                                        <option value="Sylhet">
                                        <option value="Khulna">
                                        <option value="Rajshahi">
                                        <option value="Dinajpur">
                                        <option value="Mirzapur">
                                        <option value="Mymensingh">
                                        <option value="Narayanganj">
                                        <option value="Gazipur">
                                        <option value="Gopalganj">
                                        <option value="Tangail">
                                        <option value="Bhairab Bazar">
                                        <option value="Faridpur">
                                        <option value="Chittagong">
                                        <option value="Cumilla">
                                        <option value="Brahmanbaria">
                                        <option value="Feni">
                                        <option value="Chandpur">
                                        <option value="Laksam">
                                        <option value="Akhaura">
                                        <option value="Nabinagar">
                                    </datalist>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputDate" class="form-label">Date</label>
                                    <input type="date" autocomplete="bday-day" class="form-control" id="inputDate"
                                        >
                                </div>
                                <div class="col-md-6">
                                    <label for="inputState" class="form-label">Class</label>
                                    <select id="inputState" class="form-select" >
                                        <option selected>Choose...</option>
                                        <option>F_SEAT</option>
                                        <option>AC</option>
                                        <option>F_CHAIR</option>
                                        <option>S_CHAIR</option>
                                        <option>SHOVON</option>
                                    </select>
                                </div>
                                <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-secondary">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 pt-5 pb-5 mb-5 box right">
                            <img class="img-fluid rounded mx-auto d-block text-center" src="images/bg.jpg" alt=""
                                srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </secton>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ecf8211025.js" crossorigin="anonymous"></script>
</body>

</html>