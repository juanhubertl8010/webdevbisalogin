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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
.star-rating {
    direction: rtl;
    display: inline-block;
    padding: 0;
    position: relative;
}
.star-rating input[type="radio"] {
    display: none;
}
.star-rating label {
    font-size: 24px;
    color: #ddd;
    cursor: pointer;
    padding: 0 5px;
}
.star-rating label:hover,
.star-rating label:hover ~ label,
.star-rating input[type="radio"]:checked ~ label {
    color: #ffc700;
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
                @if(Session::get('last_logged_in_userrole') === 'Joki')
                    <a class="text-body mr-3" href="{{ route('MyproductSeller') }}">Seller</a>
                @endif
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

                            <a href="{{ route('shop') }}" class="nav-item nav-link active">Shop</a>

              
                 
                            @if(Session::get('last_logged_in_username') === null)
                            <a href="{{ route('login') }}" class="nav-item nav-link">Shopping Cart</a>
                            <a href="{{ route('login') }}" class="nav-item nav-link">Wishlist</a>
                            <a href="{{ route('login') }}" class="nav-item nav-link">Checkout</a>
                            <a href="{{ route('login') }}" class="nav-item nav-link">My Transaction</a>
@else
<a href="{{ route('cart') }}" class="nav-item nav-link">Shopping Cart</a>
<a href="{{ route('wishlist') }}" class="nav-item nav-link">Wishlist</a>
<a href="{{ route('checkout') }}" class="nav-item nav-link">Checkout</a>
<a href="{{ route('contacts') }}" class="nav-item nav-link">My Transaction</a>
@endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
   
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/' . $product->imgproduct) }}" alt="Product Image" style="max-width: 50%; height: auto;">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3>{{ $product->product_name }}</h3>
                <h3 class="font-weight-semi-bold mb-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</h3>
                <p class="mb-4">{{ $product->description }}</p>
                <div class="d-flex align-items-center mb-4 pt-2">
    <!-- Add to Cart Button -->
    <button class="btn btn-primary px-3" onclick="event.preventDefault(); document.getElementById('add-to-cart-{{ $product->ID_catalog }}').submit();">
        <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
    </button>
    <form id="add-to-cart-{{ $product->ID_catalog }}" action="{{ route('cartdetail.add') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="ID_catalog" value="{{ $product->ID_catalog }}">
    </form>
</div>
            </div>
        </div>
    </div>
</div>
<div class="row px-xl-5">
    <div class="col">
        <div class="bg-light p-30">
            <div class="nav nav-tabs mb-4">
                <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews</a>
                <!-- Display the average rating -->
                @if ($averageRating)
                    <div class="text-primary ml-2 mt-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $averageRating)
                                <i class="fas fa-star"></i>
                            @elseif ($i <= ceil($averageRating))
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                        <span class="ml-2">({{ number_format($averageRating, 1) }} / 5)</span>
                    </div>
                @endif
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            @foreach ($reviews as $review)
                            <div class="media mb-4">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0">{{ $review->user->username }}</h6>
                                        <div class="text-primary ml-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="mt-2">{{ $review->review_text }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <form action="{{ route('addReview', ['id_catalog' => $product->ID_catalog]) }}" method="POST">
                                @csrf
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary star-rating">
                                        <input type="radio" name="rating" id="star5" value="5"><label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star4" value="4"><label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star3" value="3"><label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star2" value="2"><label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star1" value="1"><label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="review_text">Your Review *</label>
                                    <textarea id="review_text" name="review_text" cols="30" rows="5" class="form-control" required></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    
    <!-- Products End -->


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
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>