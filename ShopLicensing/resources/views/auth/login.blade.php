<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Licensing Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;0,700;1,400&display=swap');
        
        body {
            background-color: #51758a;
            color: white;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo img {
            width: 150px;
            height: auto;
        }
        
        .logo h1, .logo h2, .logo h3 {
            margin: 10px 0;
        }
        
        .login-form {
            background: rgba(255, 255, 255, 0.7);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2), 0 10px 20px rgba(0, 0, 0, 0.24);
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-left:90px;
        
                }
        
        .login-form:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), 0 15px 30px rgba(0, 0, 0, 0.35);
        }
        
        .login-form input {
            background: #f2f2f2;
            border-radius: 28px;
            border: 0;
            padding: 15px;
            margin-bottom: 20px;
            width: 100%;
        }
        
        .login-form button {
            background-color: #51758a;
            color: white;
            padding: 10px 22px;
            border: none;
            border-radius: 21px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        
        .login-form button:hover {
            background-color: #415a6e;
        }
        
        
        
        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        @media (min-width: 768px) {
            .login-container {
                flex-direction: row;
                text-align: left;
            }
        
            .logo {
                margin-right: 50px;
            }
        }
   </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="logo text-center text-md-left">
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
                    <h1 class="text-center mb-4">LOGIN TO YOUR ACCOUNT</h1>
                    <input type="text" placeholder="Name" name="name" autocomplete="off" required>
                    <div class="position-relative">
                        <input type="password" placeholder="Password" name="password" autocomplete="off" required>
                        
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script>
   
    </script>
</body>
</html>
