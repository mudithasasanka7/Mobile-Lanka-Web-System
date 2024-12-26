@extends('layouts.apps')

@section('title', 'Login')

@section('content')
    <div style="
        animation: slideIn 0.8s ease-in-out;
        width: 400px;
        background: #fff;
        padding: 4rem;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        text-align: center;
        color: #333;
        margin: 100px auto;
    ">
        <h2 style="font-size: 2rem; margin-bottom: 1rem; color: #388e3c;">Login</h2>

        @if ($errors->any())
            <div style="
                background: #ffcdd2;
                color: #b71c1c;
                padding: 0.5rem;
                border-radius: 5px;
                margin-bottom: 1rem;
            ">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
            @csrf
            <div style="text-align: left;">
                <label for="email" style="font-size: 1rem; margin-bottom: 0.5rem; display: block; color: #555;">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required
                    style="
                        width: 100%;
                        padding: 0.8rem;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        font-size: 1rem;
                        outline: none;
                        transition: border-color 0.3s ease;
                    ">
            </div>
            <div style="text-align: left;">
                <label for="password" style="font-size: 1rem; margin-bottom: 0.5rem; display: block; color: #555;">Password:</label>
                <input type="password" name="password" id="password" placeholder="********" required
                    style="
                        width: 100%;
                        padding: 0.8rem;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        font-size: 1rem;
                        outline: none;
                        transition: border-color 0.3s ease;
                    ">
            </div>
            <button type="submit" class="login-btn" style="
                padding: 0.8rem;
                background: #4caf50;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 1rem;
                cursor: pointer;
                transition: background 0.3s ease;
            ">Login</button>
        </form>

        <a href="{{ route('register') }}" style="
            margin-top: 1rem;
            display: inline-block;
            color: #388e3c;
            font-size: 0.9rem;
            text-decoration: underline;
            transition: color 0.3s ease;
        ">Don't have an account? Register</a>
    </div>

    <script>
        // Slide-in animation for container
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('div').style.animation = 'slideIn 0.8s ease-in-out';
        });

        // Input focus animations
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', () => {
                input.style.boxShadow = '0 0 10px rgba(76, 175, 80, 0.6)';
            });
            input.addEventListener('blur', () => {
                input.style.boxShadow = 'none';
            });
        });

        // Button hover effect
        const button = document.querySelector('.login-btn');
        button.addEventListener('mouseenter', () => {
            button.style.transform = 'scale(1.1)';
            button.style.boxShadow = '0 5px 15px rgba(76, 175, 80, 0.5)';
        });
        button.addEventListener('mouseleave', () => {
            button.style.transform = 'scale(1)';
            button.style.boxShadow = 'none';
        });

        // Keyframe animations
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateY(-50px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection
