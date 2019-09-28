<header class="site-header">
    <div class="container">
        <a href="index.html" id="branding">
            <img src="{{asset('images/logo.png')}}" alt="" class="logo">
            <div class="logo-copy">
                <h1 class="site-title">Company Name</h1>
                <small class="site-description">Tagline goes here</small>
            </div>
        </a> <!-- #branding -->

        <div class="main-navigation">
            <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
            <ul class="menu">
                <li class="menu-item {{(Request::segment(1) == '')? 'current-menu-item' : ''}}"><a href="{{url('/')}}">Home</a></li>
                <li class="menu-item {{(Request::segment(1) == 'about')? 'current-menu-item' : ''}}"><a href="{{url('about')}}">About</a></li>
                <li class="menu-item {{(Request::segment(1) == 'makes')? 'current-menu-item' : ''}}"><a href="{{url('makes')}}">Makes</a></li>
                <li class="menu-item {{(Request::segment(1) == 'models')? 'current-menu-item' : ''}}"><a href="{{url('models')}}">Models</a></li>
                <li class="menu-item {{(Request::segment(1) == 'cars')? 'current-menu-item' : ''}}"><a href="{{url('cars')}}">Cars</a></li>
                
                @php 
                    $categories = \App\Http\Controllers\HomeController::getCategories();
                @endphp
                @foreach($categories as $category)
                    <li class="menu-item"><a href="{{url('/categories/' . $category->id)}}">{{strtoupper($category->name)}}</a></li>
                @endforeach
                @if(\Auth::check())
                    <li class="menu-item"><a href="{{url('/logout')}}">Logout</a></li>
                @else
                    <li class="menu-item"><a href="{{url('/login')}}">Login</a></li>
                @endif



            </ul> <!-- .menu -->

            <form action="#" class="search-form">
                <input type="text" placeholder="Search...">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- .main-navigation -->

        <div  class="mobile-navigation">
        </div>
        @if(\Auth::check())
            Hello {{\Auth::user()->name}}
            <br>
            Your Proffesion is {{\Auth::user()->profile()->first()->profesion ?? ''}}
        @endif

    </div>
</header>