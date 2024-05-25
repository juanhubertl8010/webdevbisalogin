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
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="{{ route('About') }}">About</a>
                    <a class="text-body mr-3" href="{{ route('contacts') }}">Contact</a>
                    <a class="text-body mr-3" href="{{ route('faq') }}">FAQs</a>
                </div>
            </div>
            @if (Auth::check())
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
@else
    <div class="col-lg-6 text-center text-lg-right">
        <div class="d-inline-flex align-items-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-light" onclick="window.location.href='{{ route('login') }}'">Login</button>
            </div>
            <p class="text-black ml-2 mr-2 mb-0">Guest</p>
        </div>
    </div>
@endif


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
            <div class="col-lg-3 d-none d-lg-block">
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
            <div class="col-lg-9">
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
                            <a href="{{ route('homepage') }}" class="nav-item nav-link active">Home</a>
                            <a href="{{ route('shop') }}" class="nav-item nav-link">Shop</a>
                            <a href="{{ route('detail') }}" class="nav-item nav-link">Shop Detail</a>
                            <a href="{{ route('cart') }}" class="nav-item nav-link">Shopping Cart</a>
                            <a href="{{ route('wishlist') }}" class="nav-item nav-link">Wishlist</a>
                            <a href="{{ route('checkout') }}" class="nav-item nav-link">Checkout</a>
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div> -->
                            <a href="{{ route('contacts') }}" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="{{ route('wishlist') }}" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="{{ route('cart') }}" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/bannerml.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Joki Mobile Legend</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/bannerpubg.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Joki PUBG</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/warzonebanner.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Joki COD</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <!-- <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Featured End -->


<!-- Categories Start -->
<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Games</span></h2>
    
    <div class="row px-xl-5 pb-3" id="games-container">
    @if($games->isEmpty())
        <p>No games available</p>
    @else
        <div class="row">
            @foreach($games as $game)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="{{ route('shop.byGame', $game->ID_game) }}">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid" src="{{ asset('img/' . $game->img) }}" alt="{{ $game->game_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>{{ $game->game_name }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center" style="margin-left: 600px;">
            <div class="col-auto">
                <div class="pagination" id="games-pagination">
                    {{ $games->links() }}
                </div>
            </div>
        </div>
    @endif
</div>


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3" id="products-container">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Selected Products</span>
    </h2>
    <div class="row">
        @foreach ($products as $index => $product)
            @if($index % 4 == 0 && $index != 0)
                </div><div class="row">
            @endif
            <div class="col-lg-3 col-md-3 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('img/' . $product->imgproduct) }}" alt="{{ $product->product_name }}">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="">
                                <i class="far fa-heart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="">
                                <i class="fa fa-sync-alt"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">
                            {{ $product->product_name }}
                        </a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>Rp {{ $product->harga }}</h5>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 12px;" href="">
                            {{ $product->seller ? $product->seller->username : 'Unknown Seller' }}
                        </a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
<!-- {{-- Display pagination links --}}
{{ $products->links() }} -->
        <!-- <div class="row px-xl-5">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/fifa 22 product.jfif" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">End Game</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>Rp 97000</h5>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 15px;" href="">Menyelesaikan seluruh story GTA V</a>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 12px;" href="">Seller Name</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/fortnite product.jfif" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Visionary Strategist</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>Rp 125000</h5>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 15px;" href="">Membuat strategi yang tak terkalahkan</a>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 12px;" href="">Seller Name</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/mobile legend product 2.jfif" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Go To Epic</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>Rp 105000</h5>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 15px;" href="">Main Mobile Legend <br>sampai rank Epic.</a>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 12px;" href="">Seller Name</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/mobile legend product 3.jfif" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Conqu is the best</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>Rp 140000</h5>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 15px;" href="">Masuk ke Rank Conqueror</a>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 12px;" href="">Seller Name</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/mobile legend product.jfif" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Challenger Rank Boost</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>Rp 120000</h5>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 15px;" href="">Naik ke Challenger dalam semalam</a>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 12px;" href="">Seller Name</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/pubg mobile legend.jfif" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Sneaky Saboteur</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>Rp 100000</h5>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 15px;" href="">Mengacaukan kru tanpa ketahuan</a>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 12px;" href="">Seller Name</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/pubg product.jfif" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Legendary Adventurer</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>Rp 100000</h5>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 15px;" href="">Petualang legendaris di Warcraft</a>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 12px;" href="">Seller Name</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/valorant product.jfif" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Island Paradise</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>Rp 105000</h5>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 15px;" href="">Bangun pulau yang epic di Animal Crossing</a>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 12px;" href="">Seller Name</a>
                    </div>
                </div>
            </div>
        </div> -->
    </div> 
    <!-- Products End -->


    <!-- Vendor Start -->
    <!-- <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor End -->


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
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
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
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
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

    
    <!-- <script>
        // Sample game data
        const games = [
            { name: 'League of Legends', image: 'img/lol.jpg' },
            { name: 'Mobile Legends', image: 'img/ml.jpg' },
            { name: 'Valorant', image: 'img/valo.jpg' },
            { name: 'Counter-strike: Global Offensive', image: 'img/cs.jpg' },
            { name: 'Overwatch', image: 'img/overwatch.jpg' },
            { name: 'PUBG (PlayerUnknown\'s Battlegrounds)', image: 'img/pubg.jpg' },
            { name: 'Fortnite', image: 'img/fortnite.jpg' },
            { name: 'Call of Duty: Warzone', image: 'img/cod.jpg' },
            { name: 'Grand Theft Auto V', image: 'img/gtav.jpg' },
            { name: 'World of Warcraft', image: 'img/wow.jpg' },
            { name: 'The Witcher 3: Wild Hunt', image: 'img/witcher3 2.avif' },
            { name: 'FIFA 22', image: 'img/fifa.jpg' },
            { name: 'Among Us', image: 'img/amogus.jpg' },
            { name: 'Minecraft', image: 'img/MCPE.jpg' },
            { name: 'Animal Crossing', image: 'img/animalcrosing.jpg' }
        ];

        const itemsPerPage = 8;
        let currentPage = 1;

        function renderGames(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const gamesToDisplay = games.slice(start, end);

            const gamesContainer = document.getElementById('games-container');
            gamesContainer.innerHTML = '';

            gamesToDisplay.forEach(game => {
                const gameElement = `
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <a class="text-decoration-none" href="">
                            <div class="cat-item d-flex align-items-center mb-4">
                                <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                    <img class="img-fluid" src="${game.image}" alt="${game.name}" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div class="flex-fill pl-3">
                                    <h6>${game.name}</h6>
                                    <small class="text-body"></small>
                                </div>
                            </div>
                        </a>
                    </div>
                `;
                gamesContainer.innerHTML += gameElement;
            });
        }

        function renderPagination() {
            const pageCount = Math.ceil(games.length / itemsPerPage);
            const paginationControls = document.getElementById('pagination-controls');
            paginationControls.innerHTML = '';

            for (let i = 1; i <= pageCount; i++) {
                const pageItem = `
                    <li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#" onclick="changePage(event, ${i})">${i}</a>
                    </li>
                `;
                paginationControls.innerHTML += pageItem;
            }
        }

        function changePage(event, page) {
            event.preventDefault();
            currentPage = page;
            renderGames(page);
            renderPagination();
        }

        // Initial render
        renderGames(currentPage);
        renderPagination();
    </script> -->

<!-- <script>
    // Sample product data
    const products = [
        { name: "CS Pro Package", price: 150000, image: "img/fifa 22 product.jfif", description: "100% game selesai." },
        { name: "Monster Slayer", price: 125000, image: "img/mobile legend product 2.jfif", description: "Hancurkan semua monster." },
        { name: "Soccer Star", price: 95000, image: "img/fortnite product.jfif", description: "Bawa timmu ke kemenangan <br>dalam FIFA." },
        { name: "Legend of the Rift", price: 95000, image: "img/mobile legend product 3.jfif", description: "Reach Challenger rank quickly" },
        { name: "Joki sampai Mythic", price: 80000, image: "img/mobile legend product.jfif", description: "Winrate 100%" },
        { name: "Joki sampai Ace", price: 90000, image: "img/pubg mobile legend.jfif", description: "KDA 9.00" },
        { name: "Victory Royale", price: 100000, image: "img/pubg product.jfif", description: "Menang teruss" },
        { name: "Impostor Master", price: 110000, image: "img/valorant product.jfif", description: "Impostor winrate 100%" }
    ];

    // Function to display products based on page number
    function displayProducts(pageNumber, pageSize) {
        const startIndex = (pageNumber - 1) * pageSize;
        const endIndex = Math.min(startIndex + pageSize, products.length);
        const paginatedProducts = products.slice(startIndex, endIndex);

        const productContainer = document.getElementById('productContainer');
        productContainer.innerHTML = '';

        paginatedProducts.forEach(product => {
            const productHTML = `
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="${product.image}" alt="${product.name}">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">${product.name}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>Rp ${product.price}</h5>
                            </div>
                            <a class="h6 text-decoration-none text-truncate" style="font-size: 15px;" href="">${product.description}</a>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                            <a class="h6 text-decoration-none text-truncate" style="font-size: 12px;" href="">Seller Name</a>
                        </div>
                    </div>
                </div>
            `;
            productContainer.innerHTML += productHTML;
        });
    }

    // Pagination initialization
    const pageSize = 4; // Number of products per page
    const totalPages = Math.ceil(products.length / pageSize);

    const pagination = document.getElementById('pagination');
    for (let i = 1; i <= totalPages; i++) {
        const pageItem = document.createElement('li');
        pageItem.classList.add('page-item');
        const pageLink = document.createElement('a');
        pageLink.classList.add('page-link');
        pageLink.href = '#';
        pageLink.textContent = i;
        pageLink.addEventListener('click', (event) => {
            event.preventDefault();
            displayProducts(i, pageSize);
        });
        pageItem.appendChild(pageLink);
        pagination.appendChild(pageItem);
    }

    // Display initial page
    displayProducts(1, pageSize);
</script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Intercept clicks on pagination links for games
    $(document).on('click', '#games-pagination a', function(event) {
        event.preventDefault();
        fetchPage($(this).attr('href'), '#games-container');
    });

    // Intercept clicks on pagination links for products
    $(document).on('click', '#products-pagination a', function(event) {
        event.preventDefault();
        fetchPage($(this).attr('href'), '#products-container');
    });

    // Function to fetch the content via AJAX
    function fetchPage(url, container) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                $(container).html($(response).find(container).html());
                $('html, body').animate({
                    scrollTop: $(container).offset().top
                }, 500); // Optional: Scroll to the updated content
            },
            error: function(xhr) {
                console.log('Error:', xhr.status, xhr.statusText);
            }
        });
    }
});
</script>


<!-- {{ route('shop.byGame', $game->ID_game) }}  note ini route shopnya kalau misal dibutuh untuk pindah ke spesifik game-->
</body>

</html>