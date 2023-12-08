<div class="lines-wrap">
  <div class="lines-inner">
    <div class="lines"></div>
  </div>
</div>
<!-- END lines -->
<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close">
      <span class="icofont-close js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>
<!-- Nav -->
<nav class="site-nav">
  <div class="container">
    <div class="site-navigation">
      <a href="{{url('/')}}" class="logo m-0">Homespace <span class="text-primary">.</span></a>
      <ul class="js-clone-nav d-none d-lg-inline-block text-left float-right site-menu">
        <li class="active"><a href="{{url('/')}}">Home</a></li>
        <li class="has-children">
          <a href="#">Dropdown</a>
          <ul class="dropdown">
            <li><a href="elements.html">Elements</a></li>
            <li class="has-children">
              <a href="#">Menu Two</a>
                <ul class="dropdown">
                  <li><a href="#">Sub Menu One</a></li>
                  <li><a href="#">Sub Menu Two</a></li>
                  <li><a href="#">Sub Menu Three</a></li>
                </ul>
            </li>
            <li><a href="#">Menu Three</a></li>
          </ul>
        </li>
        <li><a href="{{url('property_buy')}}">Buy</a></li>
        <li><a href="{{url('property_rent')}}">Rent</a></li>
        <li><a href="#">About</a></li>
        <li><a href="{{url('contact')}}">Contact Us</a></li>
          @if (Route::has('login'))
            @auth
              <li> <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Hey ! {{ Auth::user()->name }}</a> 
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
              </li>
          @else
              <li class="cta-button active"><a href="{{ route('login') }}">Login</a></li>
          @if (Route::has('register'))
              <li><a href="{{ route('register') }}">Sign up</a></li> 
          @endif
          @endauth
          @endif
      </ul>
      <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
        <span></span></a>
    </div>
  </div>
</nav>
