<?php
//Connect to local database
$dbServername = "Steves-iMac.local";
$dbUsername = "user1";
$dbPassword = "password12";
$dbName = "db";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Menu</title>
    <!-- Place your stylesheet here-->
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
    <style>
        .carousel-inner {
            width: 100%;
            max-height: 420px !important;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/img_logo_white.png" width="50" height="50" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="location.html">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hours.html">Hours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <div style="margin-top: .1rem;" id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="/img/slide1.jpg" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="/img/slide2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="/img/slide3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br>
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h6 style="margin-top: .6rem;" class="card-title">Menu</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <thead>
                                <tr>
                                    <th scope="col">Dish</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Vegetarian</th>
                                </tr>
                                <!--Update table dynamically-->
                                <?php
                            $sql = "SELECT * FROM menu;";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if ($resultCheck > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {
                              echo "<tr>";
                              echo "<td>".$row['dish']."</td>";
                              echo "<td>".$row['price']."</td>";
                              echo "<td>".$row['vegetarian']."</td>";
                              echo "</tr>";
                            }
                        }
                        ?>
                            </thead>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Item
                        </button>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Menu Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="connect.php" method="post">
                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <label for="entreeName" class="form-label">Entrée Name</label>
                                            <input type="text" class="form-control" id="entreeName" name="entreeName" placeholder="" aria-label="City">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="entreeName" class="form-label">Price</label>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="" aria-label="State">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Vegetarian</label>
                                            <select id="vegetarian" name="vegetarian" class="form-select">
                                                <option selected></option>
                                                <option name="vegetarian" value="Yes">Yes</option>
                                                <option name="vegetarian" value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div style="margin-top: 1rem;" class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" action="connect.php" name="submitButton" class="btn btn-dark">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-white mt-auto" style="background-color: #212529">
        <div class="container">
            <section>
                <div class="row d-flex justify-content-center pt-5">
                    <div class="col-md-3 text-center">
                        <h6 class="font-weight-bold">
                            <a href="#!" class="text-white">About us</a>
                        </h6>
                        <p>Learn more about our restaurant.</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <h6 class="font-weight-bold">
                            <a href="#!" class="text-white">Entrées</a>
                        </h6>
                        <p>View the extened menu.</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <h6 class="font-weight-bold">
                            <a href="#!" class="text-white">Contact</a>
                        </h6>
                        <p>Our contact information.</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <h6 class="font-weight-bold">
                            <a href="#!" class="text-white">Address</a>
                        </h6>
                        <p>3066 Madison Street, Tallahassee, FL</p>
                    </div>
                </div>
            </section>
        </div>
        <div class="text-center p-3">
            © 2020 Copyright:
            <a class="text-white" href="index.html">Table 3066 LLC</a>
        </div>
    </footer>
</body>

</html>