<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Seller add product</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .form-container {
            max-width: 800px;
            margin: auto;
        }

        .btn-submit {
            background-color: #FFD700;
            border-color: #FFD700;
            color: #000;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #FFC400;
            border-color: #FFC400;
        }
        
            .quick-access {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 30px; /* Adjust the gap between links as needed */
    }

    .quick-access li::before {
        content: '•';
        margin-right: 8px; /* Adjust the space between the bullet and the link */
        color: white; /* Set the color of the bullet */
    }

    .quick-access li {
        display: inline;
    }

    .quick-access a {
        text-decoration: none;
        color: inherit; /* Ensure the link color matches the text color */
    }
    
    </style>
</head>

<body>
     <!-- Topbar Start -->
     <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="{{ route('About') }}">About</a>
                    <a class="text-body mr-3" href="{{ route('faq') }}">FAQs</a>
                    <a class="text-body mr-3" href="{{ route('homepage') }}">User</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
        <div class="d-inline-flex align-items-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-light" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
            </div>
            <p class="text-black ml-2 mr-2 mb-0">{{ Session::get('last_logged_in_username') }}</p>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
                    <div class="btn-group mx-2">
                        <!-- <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div> -->
                    </div>
                    <div class="btn-group">
                        <!-- <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div> -->
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="{{ route('homepage') }}" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Joki Gaming</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">JG</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
    <form action="{{ route('shop') }}" method="GET">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search for products">
            <div class="input-group-append">
                <button type="submit" class="input-group-text bg-transparent text-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+62 8123773546</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5" style="margin-left:250px;">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                    <div class="navbar-nav d-flex justify-content-center w-100 py-0">
                        <a href="{{ route('MyproductSeller') }}" class="nav-item nav-link ">My Product</a>
                        <a href="{{ route('myorder') }}" class="nav-item nav-link active">My Order</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row px-xl-5 justify-content-center">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>IMG</th>
                        <th>Username</th>
                        <th>Nama Produk</th>
                        <th>Price</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if($catalogItems->isEmpty())
                        <tr>
                            <td colspan="4" class="align-middle">No orders</td>
                        </tr>
                    @else
                        @foreach($catalogItems as $item)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset('img/' . $item->imgproduct) }}" alt="{{ $item->product_name }}" style="width: 50px;">
                                </td>
                                <td class="align-middle">{{ $item->buyer_username }}</td>
                                <td class="align-middle">{{ $item->product_name }}</td>
                                <td class="align-middle">Rp {{ number_format($item->transaksi_harga, 0, ',', '.') }}</td>
                                <td class="align-middle">{{ $item->transaksi_deskripsi }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="pagination justify-content-center">
    {{ $catalogItems->links() }}
</div>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">Joki Gaming Company</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Quick Access</h5>
<ul class="quick-access">
    <li><a class="text-secondary" href="{{ route('homepage') }}">Home</a></li>
    <li><a class="text-secondary" href="{{ route('shop') }}">Shop</a></li>
    <li><a class="text-secondary" href="{{ route('About') }}">About</a></li>
    <li><a class="text-secondary" href="{{ route('faq') }}">FAQ</a></li>
</ul>

                    </div>
                    <div class="col-md-4 mb-5">
                        <!-- <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div> -->
                    </div>
                    <div class="col-md-4 mb-5">
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>jokigaming@email.com</p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+62 8123773546</p>
                    </div> 
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">JokiGaming</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <!-- <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div> -->
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>