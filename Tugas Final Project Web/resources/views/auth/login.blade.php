@extends('layouts.app')

@section('content')
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }

        .container1 {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f5f5f5; /* Optional: Add background color to the container */
        }

        .login-content {
            background-color: #f1bbef;
            text-align: center;
            width: 480px;
            padding: 50px 50px;
            border-radius: 20px;
        }

        svg {
            width: 500px;
        }

        form {
            width: 360px;
        }

        .login-content svg {
            height: 100px;
        }

        .login-content h2 {
            margin: 15px 0;
            color: #481548;
            text-transform: uppercase;
            font-size: 2.9rem;
        }

        .login-content .input-div {
            position: relative;
            display: grid;
            grid-template-columns: 7% 93%;
            margin: 25px 0;
            padding: 5px 0;
            border-bottom: 2px solid #ef97e9;
        }

        .login-content .input-div.one {
            margin-top: 0;
        }

        .i {
            color: #480a44;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .i i {
            transition: .3s;
        }

        .input-div>div {
            position: relative;
            height: 45px;
        }

        .input-div>div>h5 {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #5b2056;
            font-size: 18px;
            transition: .3s;
        }

        .input-div:before,
        .input-div:after {
            content: '';
            position: absolute;
            bottom: -2px;
            width: 0%;
            height: 2px;
            background-color: #652156;
            transition: .4s;
        }

        .input-div:before {
            right: 50%;
        }

        .input-div:after {
            left: 50%;
        }

        .input-div.focus:before,
        .input-div.focus:after {
            width: 50%;
        }

        .input-div.focus>div>h5 {
            top: -5px;
            font-size: 15px;
        }

        .input-div.focus>.i>i {
            color: #64225b;
        }

        .input-div>div>input {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: none;
            padding: 0.5rem 0.7rem;
            font-size: 1.2rem;
            color: #555;
            font-family: 'poppins', sans-serif;
        }

        .input-div.pass {
            margin-bottom: 4px;
        }

        a {
            display: block;
            text-align: right;
            text-decoration: none;
            color: rgb(86, 15, 84);
            font-size: 0.9rem;
            transition: .3s;
        }

        a:hover {
            color: #551248;
        }

        .btn {
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            outline: none;
            border: none;
            background-image: linear-gradient(to right, #d07ecf, #86347d, #5b2056);
            background-size: 200%;
            font-size: 1.2rem;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
        }

        .btn:hover {
            background-position: right;
        }
    </style>

    <div class="container1">
        <div class="login-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2 class="title">Login</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input id="email" type="email" class="input @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input id="password" type="password" class="input @error('password') is-invalid @enderror"
                            name="password" required ">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <a href="{{ route('register') }}">Register</a>
                <input type="submit" class="btn" value="Login" />
            </form>
        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll(".input");

        function addcl() {
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl() {
            let parent = this.parentNode.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }

        inputs.forEach((input) => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });
    </script>
@endsection
