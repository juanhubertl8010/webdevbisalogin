<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
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
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
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
                @if(Session::get('last_logged_in_userrole') === 'Joki')
                    <a class="text-body mr-3" href="{{ route('MyproductSeller') }}">Seller</a>
                @endif
            </div>
        </div>
    <div class="col-lg-6 text-center text-lg-right">
        <div class="d-inline-flex align-items-center">
            <div class="btn-group">
            @if(Session::get('last_logged_in_username') === null)
            <button type="button" class="btn btn-sm btn-light" onclick="window.location.href='{{ route('login') }}';">Login</button>
    <p class="text-black ml-2 mr-2 mb-0" style="background-color: yellow;">Guest</p>
@else


    <button type="button" class="btn btn-sm btn-light" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
    <p class="text-black ml-2 mr-2 mb-0">{{ Session::get('last_logged_in_username') }}</p>
@endif
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
        <div class="row px-xl-5">
            <div class="col-lg-2 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Moba <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="{{ url('shop/G0004') }}" class="dropdown-item">League of Legends</a>
                                <a href="{{ url('shop/G0001') }}" class="dropdown-item">Mobile Legends</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">First-Person-Shooter <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="{{ url('shop/G0007') }}" class="dropdown-item">Valorant</a>
                                <a href="{{ url('shop/G0013') }}" class="dropdown-item">Counter-Strike: Global Offensive</a>
                                <a href="{{ url('shop/G0011') }}" class="dropdown-item">Overwatch</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Battle Royale <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="{{ url('shop/G0002') }}" class="dropdown-item">PUBG (PlayerUnknown's Battlegrounds)</a>
                                <a href="{{ url('shop/G0003') }}" class="dropdown-item">Fortnite</a>
                                <a href="{{ url('shop/G0006') }}" class="dropdown-item">Call of Duty: Warzone</a>
                                <a href="{{ url('shop/G0015') }}" class="dropdown-item">Grand Theft Auto V</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">MMORPG<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="{{ url('shop/G0014') }}" class="dropdown-item">World of Warcraft</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">RPG (Role-Playing Game)<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="{{ url('shop/G0010') }}" class="dropdown-item">The Witcher 3: Wild Hunt</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sports<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="{{ url('shop/G0009') }}" class="dropdown-item">FIFA 22</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Party Game<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="{{ url('shop/G0005') }}" class="dropdown-item">Among Us</a>
                                <a href="{{ url('shop/G0008') }}" class="dropdown-item">Minecraft</a>
                                <a href="{{ url('shop/G0012') }}" class="dropdown-item">Animal Crossing</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9 d-flex justify-content-center">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('homepage') }}" class="nav-item nav-link">Home</a>
                            <a href="{{ route('shop') }}" class="nav-item nav-link">Shop</a>
                            @if(Session::get('last_logged_in_username') === null)
                            <a href="{{ route('login') }}" class="nav-item nav-link">Shopping Cart</a>
                            <a href="{{ route('login') }}" class="nav-item nav-link ">Wishlist</a>
                            <a href="{{ route('login') }}" class="nav-item nav-link">Checkout</a>
                            <a href="{{ route('login') }}" class="nav-item nav-link">My Transaction</a>
@else
<a href="{{ route('cart') }}" class="nav-item nav-link">Shopping Cart</a>
<a href="{{ route('wishlist') }}" class="nav-item nav-link  ">Wishlist</a>
<a href="{{ route('checkout') }}" class="nav-item nav-link">Checkout</a>
<a href="{{ route('contacts') }}" class="nav-item nav-link active">My Transaction</a>
@endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Contact Start -->
    <div class="container-fluid">
    <div class="container-fluid">
    <div class="row px-xl-5 justify-content-center">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>IMG</th>
                        <th>Nama produk </th>
                        <th>Price</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                @forelse($transaksiItems as $item)
    @if($item->statusdel == false)
        <tr>
            <td class="align-middle">
                <img src="{{ asset('img/' . $item->imgproduct) }}" alt="" style="width: 50px;"> 
            </td>
            <td class="align-middle"> {{ $item->product_name }}</td>
            <td class="align-middle">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
            <td class="align-middle"> {{ $item->deskripsi }}</td>
            <td class="align-middle">Payment Successful</td>
        </tr>
    @endif
@empty
    <tr>
        <td colspan="3">No items in Transaction</td>
    </tr>
@endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
    <div class="pagination justify-content-center">
    {{ $transaksiItems->links() }}
</div>

    <!-- Contact End -->


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