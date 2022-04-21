<?php
//Connect to database
//include_once 'php/dbConnection.php';
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
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Menu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Place your stylesheet here-->
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">

    <style>
        .carousel-inner {
            width: 100%;
            max-height: 420px !important;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/img_logo.png" width="42" height="42" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="menu.html">Menu</a>
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
    <br>
    <br>
    <main class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/slide1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/slide2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/slide3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h4 style="margin-top: .6rem;" class="card-title">Menu Table 3066</h4>
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                <button type="submit" action="connect.php" name="submitButton" class="btn btn-primary">Submit</button>


                              </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" action="connect.php" name="submitButton" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div>
        <!-- Footer -->
        <footer class="text-white" style="background-color: #3f51b5">
            <!-- Grid container -->
            <div class="container">
                <!-- Section: Links -->
                <section class="mt-5">
                    <!-- Grid row-->
                    <div class="row d-flex justify-content-center pt-5">
                        <!-- Grid column -->
                        <div class="col-md-3">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="#!" class="text-white">About us</a>
                            </h6>
                            <p>
                                <a href="#!" class="text-white">Your Account</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Become an Affiliate</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Shipping Rates</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->
                        <div class="col-md-3">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="#!" class="text-white">Entrées</a>
                            </h6>
                            <p>
                                <a href="#!" class="text-white">Your Account</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Become an Affiliate</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Shipping Rates</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->
                        <div class="col-md-3">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="#!" class="text-white">Contact</a>
                            </h6>
                            <p>
                                <a href="#!" class="text-white">Your Account</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Become an Affiliate</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Shipping Rates</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->
                        <div class="col-md-3 text-center">
                            <h6 class="text-uppercase font-weight-bold">
                                <a href="#!" class="text-white">Adress</a>
                            </h6>
                            <!--                            <p>600 W College Ave, Tallahassee, FL 32306, United States</p>-->
                            <table class="table text-center text-white">
                                <tbody class="font-weight-normal">
                                    <tr>
                                        <td>Mon - Thu:</td>
                                        <td>11am - 10pm</td>
                                    </tr>
                                    <tr>
                                        <td>Fri - Sat:</td>
                                        <td>11am - 11pm</td>
                                    </tr>
                                    <tr>
                                        <td>Sunday:</td>
                                        <td>11am - 9pm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
        </footer>
    </div>
</body>
</html>