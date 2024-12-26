@extends('layouts.apps')

@section('title', 'Register')

@section('content')
    <div style="
        animation: fadeIn 0.8s ease-in-out;
        width: 400px;
        background: #fff;
        padding: 4rem;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        margin: 50px auto;
        text-align: center;
        color: #333;
    ">
        <h2 style="font-size: 2rem; margin-bottom: 1rem; color: #388e3c;">Register</h2>

        <form action="{{ url('/register') }}" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
            @csrf
            <div style="text-align: left;">
                <label for="name" style="font-size: 1rem; margin-bottom: 0.5rem; display: block; color: #555;">Name:</label>
                <input type="text" name="name" id="name" required
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
                <label for="email" style="font-size: 1rem; margin-bottom: 0.5rem; display: block; color: #555;">Email:</label>
                <input type="email" name="email" id="email" required
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
                <input type="password" name="password" id="password" required
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
                <label for="password_confirmation" style="font-size: 1rem; margin-bottom: 0.5rem; display: block; color: #555;">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
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
            <button type="submit" style="
                padding: 0.8rem;
                background: #4caf50;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 1rem;
                cursor: pointer;
                transition: background 0.3s ease, transform 0.2s ease;
            ">Register</button>
        </form>

        <a href="{{ route('login') }}" style="
            margin-top: 1rem;
            display: inline-block;
            color: #388e3c;
            font-size: 0.9rem;
            text-decoration: underline;
            transition: color 0.3s ease;
        ">Already have an account? Login</a>
    </div>

    <script>
        // Input focus animation
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', () => {
                input.style.boxShadow = '0 0 10px rgba(76, 175, 80, 0.6)';
                input.style.borderColor = '#4caf50';
            });

            input.addEventListener('blur', () => {
                input.style.boxShadow = 'none';
                input.style.borderColor = '#ddd';
            });
        });

        // Button hover effect
        const button = document.querySelector('button[type="submit"]');
        button.addEventListener('mouseenter', () => {
            button.style.transform = 'scale(1.05)';
            button.style.backgroundColor = '#388e3c';
        });

        button.addEventListener('mouseleave', () => {
            button.style.transform = 'scale(1)';
            button.style.backgroundColor = '#4caf50';
        });

        // Keyframe animations
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
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
