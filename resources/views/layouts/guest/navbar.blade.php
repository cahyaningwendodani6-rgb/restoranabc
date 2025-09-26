 <header id="header">

     <!-- Top nav -->
     <div id="top-nav">
         <div class="container">

             <!-- logo -->
             <div class="logo">
                 <a href="{{ url('/') }}"><img src="{{ asset('tpt/img/logo0.jpg') }}" alt="logo"></a>
             </div>
             <!-- logo -->

             <!-- Mobile toggle -->
             <button class="navbar-toggle">
                 <span></span>
             </button>
             <!-- Mobile toggle -->

             <!-- social links -->
             <!-- /social links -->

         </div>
     </div>
     <!-- /Top nav -->

     <!-- Bottom nav -->
     <div id="bottom-nav">
         <div class="container">
             <nav id="nav">

                 <!-- nav -->
                 <ul class="main-nav nav navbar-nav">
                     <li><a href="{{ route('landing') }}">Home</a></li>
                     <li><a href="#about">About</a></li>
                     <li><a href="#menu">Menu</a></li>
                 </ul>
                 <!-- /nav -->

                 <!-- button nav -->
                 <ul class="cta-nav">
                     <li><a href="{{ route('pesanan') }}" class="main-button">Pesan</a></li>
                 </ul>
                 <!-- button nav -->

                 <!-- contact nav -->
                 <ul class="contact-nav nav navbar-nav">
                     <li><a href="tel:0455481497"><i class="fa fa-phone"></i> 0822-3511-7203</a></li>
                     <li><a href="#"><i class="fa fa-map-marker"></i> 3685 ABC Street</a></li>
                 </ul>
                 <!-- contact nav -->

             </nav>
         </div>
     </div>
     <!-- /Bottom nav -->


 </header>
