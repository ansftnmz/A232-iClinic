<?php
session_start();
require_once 'dbconnect.php';

$query = "SELECT * FROM tbl_services ORDER BY service_category, service_name";
$stmt = $conn->prepare($query);
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Group services by category
$groupedServices = [];
foreach ($services as $service) {
    $groupedServices[$service['service_category']][] = $service;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Business Frontpage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/homepage.css" rel="stylesheet" />
    </head>
    <body>
      <!-- Responsive navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">iClinic</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse js-scroll-trigger" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#service">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5" >
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Focused on Your Eye Health</h1>
                            <p class="lead text-white-50 mb-4">At iClinic, we are dedicated to providing exceptional eye care with a personalized touch. Our mission is to ensure that every patient enjoys optimal vision and eye health through state-of-the-art technology and compassionate service.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#service">Our Services</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- service  -->
            <body>
    <section class="bg-light py-5 border-bottom" id="service">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">See clearly, live fully</h2>
                <p class="lead mb-0">With our services</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <?php foreach ($groupedServices as $category => $serviceGroup): ?>
                    <div class="col-lg-6 col-xl-4">
                        <div class="card mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <img src="img/service/<?php echo $serviceGroup[0]['category_id']; ?>.jpeg" class="img-fluid mb-3" alt="<?php echo $category; ?>">
                                <div class="small text-uppercase fw-bold text-muted"><?php echo $category; ?></div>
                                <div class="small text-uppercase fw-bold text-muted">start from</div>
                                <div class="mb-3">
                                    <span class="display-6 fw-bold">RM<?php echo $serviceGroup[0]['service_price']; ?></span>
                                    <span class="text-muted">/ session</span>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#serviceModal<?php echo $serviceGroup[0]['category_id']; ?>"
                                            data-service-name="<?php echo $serviceGroup[0]['service_name']; ?>"
                                            data-service-description="<?php echo $serviceGroup[0]['service_description']; ?>"
                                            data-service-price="RM<?php echo $serviceGroup[0]['service_price']; ?>">
                                        More Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($serviceGroup as $service): ?>
                        <div class="modal fade" id="serviceModal<?php echo $service['category_id']; ?>" tabindex="-1"
                             aria-labelledby="serviceModalLabel<?php echo $service['category_id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="serviceModalLabel<?php echo $service['service_id']; ?>">
                                            <?php echo $service['service_category']; ?></h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <table class="table table-striped">
                                    <?php foreach ($serviceGroup as $service): ?>
                                      <div class="service-details mb-3">
                                    
                                        <tr>
                                        <th><p id="service-name<?php echo $service['service_id']; ?>"><?php echo $service['service_name']; ?></p></th>
                                        <th><p id="serviceDescription<?php echo $service['service_id']; ?>"><?php echo $service['service_description']; ?></p></th>
                                        <th><p class="service-price" id="servicePrice<?php echo $service['service_id']; ?>">RM <?php echo $service['service_price']; ?></p></th>
                                        </tr>  
                                      
                                    </div>
                                    <?php endforeach; ?>
                                     </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
        </header>
        <footer class="py-1 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; iClinic 2024</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>