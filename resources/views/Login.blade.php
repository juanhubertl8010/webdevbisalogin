<!DOCTYPE html>
<html>
<head>
    <title>Slide Navbar</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slide_navbar_style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background: linear-gradient(to bottom, #ffc800, #e89c10, #ff9d00);
        }
        .main {
            width: 350px;
            height: 500px;
            background: red;
            overflow: hidden;
            background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/cover;
            border-radius: 10px;
            box-shadow: 5px 20px 50px #000;
        }
        #chk {
            display: none;
        }
        .signup {
            position: relative;
            width: 100%;
            height: 100%;
        }
        label {
            color: #fff;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 60px;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }
        input {
            width: 60%;
            height: 20px;
            background: #e0dede;
            justify-content: center;
            display: flex;
            margin-left: 60px;
            margin-top: 10px;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
        }
        button {
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #000000;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }
        button:hover {
            background: #333334;
        }
        .login {
            height: 460px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: .8s ease-in-out;
        }
        .login label {
            color: #e89c10;
            transform: scale(.6);
        }
        #chk:checked ~ .login {
            transform: translateY(-500px);
        }
        #chk:checked ~ .login label {
            transform: scale(1);
        }
        #chk:checked ~ .signup label {
            transform: scale(.6);
        }
        .forgot-password {
            text-align: right;
            margin-top: 10px;
            font-size: 12px;
            margin-right: 20px;
        }
        .forgot-password a {
            text-decoration: none;
            color: #000;
        }
        .forgot-password a:hover {
            color: blue;
        }
        .input-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            margin-right: 20px;
            color: rgb(58, 57, 57);
        }
        .input-group label {
            font-size: 12px;
            margin: 0;
            color: black;
            font-weight: normal;
        }
        .input-group input[type="checkbox"] {
            width: auto;
            margin-left: 225px;
            margin-bottom: 10px;
        }
        #link-container {
            text-align: center;
            margin-top: 20px;
        }
        .error-message {
            font-size: 14px;
            color: red;
            text-align: center;
        }
        .alert-success {
            color:white;
            text-align:center;
            margin-top: 50px;
        }
        
    </style>
</head>
<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
        <form action="{{ url('/usrlogin/register') }}" method="POST">
    {{ csrf_field() }}
    <label for="chk" aria-hidden="true">Sign up</label>
    @if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif
    <input type="text" name="username1" placeholder="User name" required="">
    <input type="email" name="email" placeholder="Email" required="">
    <input type="password" name="password" placeholder="Password" required="">
    <select name="role" id="role" style="width: 66%; height: 40px; background: #e0dede; justify-content: center; display: flex; margin: 10px auto; padding: 10px; border: none; outline: none; border-radius: 5px; margin-top: 10px;">
        <option value="Joki">Joki</option>
        <option value="User" selected>User</option>
        <option value="Admin">Admin</option>
    </select>
    <button type="submit">Sign up</button>
</form>
        </div>

        <div class="login">
            <form action="{{ url('/usrlogin/login') }}" method="POST">
                {{ csrf_field() }}
                <label for="chk" aria-hidden="true">Login</label>
                @if($errors->has('error'))
                    <div class="error-message">{{ $errors->first('error') }}</div>
                @endif
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="pswd" placeholder="Password" required>
                <div class="forgot-password">
                    <a href="{{ route('forgotpass') }}">Forgot Password?</a>
                </div>
                <div class="input-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <script>
        function redirectToHomepage(event) {
            event.preventDefault();
            window.location.href = '{{ route('homepage') }}';
        }
    </script>
</body>
</html>
