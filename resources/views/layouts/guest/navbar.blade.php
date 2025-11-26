 <nav class="fh5co-nav" role="navigation">
     <a href="/login" class="btn-login-admin">Login Admin</a>

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

 <style>
     .btn-login-admin {
         position: absolute;
         right: 20px;
         top: 20px;
         border: 1px solid white;
         padding: 8px 15px;
         border-radius: 5px;
         color: white;
         z-index: 999;
     }

     .btn-login-admin:hover {
         background: white;
         color: black;
     }
 </style>
