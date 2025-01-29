 <!-- partial:partials/_navbar.html -->
 <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
     <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
         <a class="navbar-brand brand-logo mr-5" href="index.html">
             <img src="{{ asset('img/icasve_logo.jpg') }}" class="mr-2 w-10 h-15" alt="logo" />
         </a>
         <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('img/icasve_logo.jpg') }}" class="mr-2 w-10 h-15" alt="logo" /></a>
     </div>
     <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
         @role('admin')
             <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                 <span class="icon-menu"></span>
             </button>
         @endrole
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
             data-toggle="offcanvas">
             <span class="icon-menu"></span>
         </button>
     </div>
 </nav>
