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

        .container2 {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full height of the viewport */
        }

        .login-content1 {
            background-color: #e4ade3;
            text-align: center;
            width: 480px;
            padding: 0 50px;
            border-radius: 20px;
        }

        .login-content1 form {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 1rem;
            margin-top: 20px;
        }

        .login-content1 h2 {
            margin: 15px 0;
            color: #3b103b;
            text-transform: uppercase;
            font-size: 2.5rem;
        }

        .input-div {
            position: relative;
            display: grid;
            grid-template-columns: 7% 93%;
            margin: 10px 0;
            padding: 5px 0;
            border-bottom: 2px solid #8a3b84;
        }

        .i {
            color: #ef97e9;
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
            background-color: #eb86d3;
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
            color: #e18cd5;
        }

        .input-div>div>input,
        .input-div>div>select {
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

        a {
            display: block;
            text-align: right;
            text-decoration: none;
            color: rgb(86, 15, 84);
            font-size: 0.9rem;
            transition: .3s;
        }

        a:hover {
            color: #d338b4;
        }

    </style>

    <div class="container2">
        <div class="login-content1">
            <h2 class="title mt-5">Register</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Name</h5>
                        <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input id="password" type="password" class="input" name="password" required autocomplete="new-password">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Confirm Password</h5>
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <select id="role" class="input" name="role" required>
                            <option value="" disabled selected>Role</option>
                            <option value="seeker" {{ old('role') == 'seeker' ? 'selected' : '' }}>Pelamar</option>
                            <option value="recruiter" {{ old('role') == 'recruiter' ? 'selected' : '' }}>Penyedia Lamaran</option>
                        </select>
                    </div>
                </div>
                <a href="{{ route('login') }}">Login</a>
                <input type="submit" class="btn" value="Register">
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

        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });
    </script>
@endsection
