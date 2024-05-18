<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/simple-datatables/adminstyle.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/adminstyle.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>.table-full-width {
    width: 100%;
  }</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('adminhome') }}" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Joki Gaming</span>
      </a>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('adminhome') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!--  -->

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admintable') }}">
          <i class="bi bi-grid"></i>
          <span>Table</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('adminaddgame') }}">
          <i class="bi bi-grid"></i>
          <span>Add Games</span>
        </a>
      </li><!-- End Profile Page Nav -->



      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>End Profile Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li>End F.A.Q Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li>End Contact Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li>End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('login') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li>End Error 404 Page Nav
 -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li>End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User</h5>
              <!-- Default Table -->
              <table class="table table-full-width">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sub_date</th>
                    <th scope="col">Remove</th> <!-- New column for Remove -->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Joki</td>
                    <td>Donkey</td>
                    <td>donkey@mail.com</td>
                    <td>2016-05-25</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>User</td>
                    <td>Jess</td>
                    <td>jess@mail.com</td>
                    <td>2014-12-05</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>User</td>
                    <td>Benjamin</td>
                    <td>Benjamin@mail.com</td>
                    <td>2011-08-12</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Games</h5>
              <!-- Default Table -->
              <table class="table table-full-width">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Game Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Remove</th> <!-- New column for Remove -->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mobile Legends</td>
                    <td>Game 5v5</td>
                    <td>Moba</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Valorant</td>
                    <td>Tembak-tembakan</td>
                    <td>Action</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Fifa 22</td>
                    <td>Playing Football</td>
                    <td>Sport</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Keranjang</h5>
              <!-- Default Table -->
              <table class="table table-full-width">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Keranjang</th>
                    <th scope="col">ID User</th>
                    <th scope="col">Total keranjang</th>
                    <th scope="col">Remove</th> <!-- New column for Remove -->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>K0001</td>
                    <td>U0001</td>
                    <td>Rp 50.000</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>K0002</td>
                    <td>U0002</td>
                    <td>Rp 100.000</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>K0003</td>
                    <td>U0003</td>
                    <td>Rp 75.000</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Transaksi</h5>
              <!-- Default Table -->
              <table class="table table-full-width">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">ID User</th>
                    <th scope="col">Total Transaksi</th>
                    <th scope="col">Remove</th> <!-- New column for Remove -->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>T0001</td>
                    <td>U0001</td>
                    <td>Rp 90.000</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>T0002</td>
                    <td>U0002</td>
                    <td>Rp 120.000</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>T0003</td>
                    <td>U0003</td>
                    <td>Rp 85.000</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Wishlist</h5>
              <!-- Default Table -->
              <table class="table table-full-width">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID User</th>
                    <th scope="col">ID Catalog</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Remove</th> <!-- New column for Remove -->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>U0001</td>
                    <td>L0001</td>
                    <td>Rp 90.000</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>U0002</td>
                    <td>L0002</td>
                    <td>Rp 120.000</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>U0003</td>
                    <td>L0003</td>
                    <td>Rp 85.000</td>
                    <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Catalog</h5>
            <!-- Default Table -->
            <table class="table table-full-width">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID Game</th>
                  <th scope="col">ID User</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Remove</th> <!-- New column for Remove -->
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>L0001</td>
                  <td>G0001</td>
                  <td>U0001</td>
                  <td>Joki To Mythic</td>
                  <td>Rp 80.000</td>
                  <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>L0002</td>
                  <td>G0002</td>
                  <td>U0002</td>
                  <td>From Warrior To Epic</td>
                  <td>Rp 97.000</td>
                  <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>L0003</td>
                  <td>G0003</td>
                  <td>U0003</td>
                  <td>Hattric Goal</td>
                  <td>Rp 50.000</td>
                  <td><button class="btn btn-danger">Remove</button></td> <!-- Button for Remove -->
                </tr>
              </tbody>
            </table>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <!-- <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div> -->
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="vendor/apexcharts/apexcharts.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/chart.js/chart.umd.js"></script>
  <script src="vendor/echarts/echarts.min.js"></script>
  <script src="vendor/quill/quill.js"></script>
  <script src="vendor/simple-datatables/simple-datatables.js"></script>
  <script src="vendor/tinymce/tinymce.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="js/adminmain.js"></script>

</body>

</html>