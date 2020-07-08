<header>
    <div class="header-top">
        <div class="container">
            <a href="{{ route('home') }}" class="logo">
                <span><i class="shopping_cart material-icons">shopping_cart</i></span>
                <span class="logo-text">Hanouti</span>
            </a>
            <div class="header-top-right">
                <div class="search">
                    <form id="search-form" action="{{ route('search-result') }}" method="GET">
                        @csrf
                        <input type="text" class="search-input" id="top-search-input" name="data" placeholder="Type to search">
                    </form>
                    <a href="#"  id="top-search-link" class="search-link">
                        <i class="material-icons">
                        search
                        </i>
                    </a>
                </div>
                <div class="profile">
                    <a href="#" class="profile-link">
                        <div class="logo-count">
                            <span class="profile-logo material-icons">
                                @auth
                                    person
                                @endauth
                                @guest
                                    person_add
                                @endguest
                            </span>
                            @auth
                                {{--  <div class="profile-count">10</div>  --}}
                            @endauth
                        </div>
                        <span class="profile-title no-selectable-text">
                            @auth
                                Profile
                            @endauth
                            @guest
                                Sign in
                            @endguest
                        </span>
                    </a>
                    <div class="nav-profile content">
                        <div class="top-content">
                            <span class="no-selectable-text">
                                @auth
                                    Profile
                                @endauth
                                @guest
                                    Account
                                @endguest
                            </span>
                        </div>
                        <div class="bottom-content">
                            @auth
                                {{--  The user is authenticated...  --}}
                                <div class="profile">
                                    <div class="profile-details">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    @if ($auth->isAdmin())
                                        <a href="{{ route('admin') }}">Dashboard</a>
                                    @endif
                                    @if ($auth->isSeller())
                                        <a href="{{ route('seller') }}">Dashboard</a>
                                    @endif

                                </div>
                            @endauth
                            @guest
                                {{--  The user is not authenticated...  --}}
                                <div class="actions">
                                    <a href="{{ route('login') }}" class="btn">Log in</a>
                                    <a href="{{ route('register') }}" class="btn">Create an account</a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
                @auth
                    @if ($auth->carts->count()>0)
                        <div class="cart">
                            <a href="@auth
                                        {{ route('carts.show',['cart'=>$auth->carts[0]->id])}}
                                    @endauth" class="cart-link">
                                <div class="cart-count">
                                    <span class="cart-logo material-icons">
                                        shopping_cart
                                    </span>
                                    @auth
                                        <div class="items-count">
                                            {{ $auth->carts->count() }}
                                        </div>
                                    @endauth
                                </div>
                                <span class="cart-title">Cart</span>
                            </a>
                            <div class="nav-cart content">
                                <div class="top-content">
                                    <span  class="no-selectable-text">Cart</span>
                                </div>
                                <div class="bottom-content">
                                    <div class="cart-products-container">
                                        @auth
                                            <a href="{{ route('carts.create')}}">add cart</a><br>
                                            @if ($auth->carts->count()>1)
                                                <a href="{{ route('carts.delete.list.show')}}">delete carts</a>
                                            @endif
                                        @endauth
                                        @guest
                                            Not connected
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth

                <div class="hamburger close">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-center">
        <ul class="container">
            <li class="active">
                <a href="#">Menu</a>
            </li>
            <li>
                <a href="#">Cart</a>
            </li>
            <li>
                <a href="#">Profile</a>
            </li>
        </ul>
    </div>
    <nav class="header-bottom">
        <div class="container">
            <ul class="nav-menu-list">
                <li>
                    <a href="{{ route('categories.index') }}" class="categories">
                        <i class="material-icons">format_list_bulleted</i>
                        <span>Categories</span>
                    </a>
                    <ul class="menu-sublist">
                        <li>
                            <a href="{{ route('categories.products', ['id'=>1]) }}">Home and kitchen</a>
                            <ul class="menu-sublist">
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>1, 'idSubCategory'=>1]) }}">Furnishing and Decoration</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>1, 'idSubCategory'=>2]) }}">Home appliance and Tableware</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>1, 'idSubCategory'=>3]) }}">Home laundry and Toiletry</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>1, 'idSubCategory'=>4]) }}">Garden and Garage</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>1, 'idSubCategory'=>5]) }}">Spice and Ingredient</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('categories.products', ['id'=>2]) }}">Beauty and health</a>
                            <ul class="menu-sublist">
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>2, 'idSubCategory'=>1]) }}">Nutrition and Vitamin</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>2, 'idSubCategory'=>2]) }}">Sport and Well-being</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>2, 'idSubCategory'=>3]) }}">Optics and lens</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>2, 'idSubCategory'=>4]) }}">Makeup and Perfume</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>2, 'idSubCategory'=>5]) }}">Fashion and Brilliance</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('categories.products', ['id'=>3]) }}">High-tech and gadget</a>
                            <ul class="menu-sublist">
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>3, 'idSubCategory'=>1]) }}">Phone and Tablet</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>3, 'idSubCategory'=>2]) }}">Camera and Camcorder</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>3, 'idSubCategory'=>3]) }}">Computer and Device</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>3, 'idSubCategory'=>4]) }}">Home cinema and TV</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>3, 'idSubCategory'=>5]) }}">Connected object</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('categories.products', ['id'=>4]) }}">Game and Console</a>
                            <ul class="menu-sublist">
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>4, 'idSubCategory'=>1]) }}">Controller & Video game</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>4, 'idSubCategory'=>2]) }}">Consoles & PC gamer</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>4, 'idSubCategory'=>3]) }}">Game & Toy</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('categories.products', ['id'=>5]) }}">Clothing, Footwear and Jewerly</a>
                            <ul class="menu-sublist">
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>5, 'idSubCategory'=>1]) }}">Jewelry & Bags</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>5, 'idSubCategory'=>2]) }}">Fashion men</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>5, 'idSubCategory'=>3]) }}">Fashion women</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>5, 'idSubCategory'=>4]) }}">Fashion baby</a></li>
                                <li><a href="{{ route('sub.categories.products', ['idCategory'=>5, 'idSubCategory'=>5]) }}">Hat & Cap</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('stores.index') }}">Stores</a>
                    <ul class="menu-sublist">
                        <li><a href="{{ route('stores.topStores') }}">Top stores</a></li>
                        <li><a href="{{ route('stores.popStores') }}">Populars stores</a></li>
                        <li><a href="{{ route('stores.weeksStores') }}">Stores of the week</a></li>
                        <li><a href="{{ route('stores.aroundStores') }}">Stores around</a></li>
                        <li><a href="{{ route('stores.newStores') }}">New stores</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('productStores.index') }}">Products</a>
                    <ul class="menu-sublist">
                        <li><a href="{{ route('productStores.popularProducts') }}">Populars products</a></li>
                        <li><a href="#">Top products</a></li>
                        <li><a href="#">Top deals</a></li>
                        <li><a href="#">New Products</a></li>
                        <li><a href="#">Products around</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Sellers</a>
                    <ul class="menu-sublist">
                        <li><a href="#">Populars sellers</a></li>
                        <li><a href="#">Top sellers</a></li>
                        <li><a href="#">Sellers of the week</a></li>
                        <li><a href="#">New sellers</a></li>
                        <li><a href="#">Sellers around</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Sales off</a>
                </li>
                <li>
                    <a href="#">New arrivals</a>
                </li>
            </ul>
            <ul class="nav-lang-list">
                <li class="active"><a href="#">French</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
    </nav>
</header>
