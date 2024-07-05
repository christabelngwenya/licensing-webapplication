<!DOCTYPE html>
<html>
   <head>
    <title>Licensing Login Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
   </head>
   <body>
       <div class="login-logo">
           <div class="logo">
               <img src="{{ asset('images/BCC-removebg-preview(4).png') }}" alt="City Of Bulawayo">
               <h1>Shop Licensing</h1>
               <h2>CITY OF BULAWAYO</h2>
               <h3>Shop Licensing Made Convenient</h3>
           </div>
           <div class="login-form">
               <form action="{{ route('login') }}" method="POST">
                   @csrf
                   @if ($errors->any())
                       <div id="error" class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif
                   <h1>LOGIN TO YOUR ACCOUNT</h1>
                   <input type="text" placeholder="name" name="name" autocomplete="off" required/>
                   <div class="password-input-wrapper">
                     <input type="password" placeholder="Password" name="password" autocomplete="off" required/>
                     <i class="fa fa-eye toggle-password"></i>
                   </div>


                   <button type="submit">Login</button>
               </form>
           </div>
       </div>
       <script src="{{asset('js/login.js')}}"></script>
   </body>
</html>
