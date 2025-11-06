 <nav class="fh5co-nav" role="navigation">
     <div class="container">
         <div class="row">
             <div class="col-xs-12 text-center logo-wrap">
                 <div id="fh5co-logo">
                     <a href="{{ url('/') }}">RestoranABC<span>.</span></a>
                 </div>
             </div>
             <div class="col-xs-12 text-center menu-1 menu-wrap">
                 <ul>
                     <li class="{{ request()->is('/') ? 'active' : '' }}">
                         <a href="{{ url('/') }}">Home</a>
                     </li>
                     <li class="{{ request()->is('menunya') ? 'active' : '' }}">
                         <a href="{{ url('/menunya') }}">Menu</a>
                     </li>
                     <li class="{{ request()->is('gallery*') ? 'active' : '' }}">
                         <a href="{{ url('/gallery') }}">Gallery</a>
                     </li>
                     <li class="{{ request()->is('pemesanan*') ? 'active' : '' }}">
                         <a href="{{ url('/pemesanan') }}">Pemesanan</a>
                     </li>
                     <li class="{{ request()->is('about') ? 'active' : '' }}">
                         <a href="{{ url('/about') }}">About</a>
                     </li>
                     <li class="{{ request()->is('contact') ? 'active' : '' }}">
                         <a href="{{ url('/contact') }}">Contact</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </nav>
