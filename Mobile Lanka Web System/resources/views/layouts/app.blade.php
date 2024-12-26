<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Mobile Lanka</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"  sizes="32x32">
</head>
<body style="margin: 0; font-family: Arial, sans-serif;">

    <!-- Header (Navigation Bar) -->
<header style="background-color: #ff4747; padding: 10px 0; font-family: Arial, sans-serif; color: white; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); position: sticky; top: 0; z-index: 1000;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
        
        <!-- Logo Section -->
        <div>
            <a href="{{ url('/home') }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                <h3 style="padding-right: 70px;"> Mobile Lanka </h3>
            </a>
        </div>

        <!-- Search Bar Section -->
        <div style="flex: 3; display: flex; justify-content: center; align-items: center;">
            <input type="text" id="search" placeholder="Search for products, brands, and more"  style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px; outline: none;">
            <button onclick="filterProducts()" style="padding: 10px 20px; background-color: #ff6a00; border: none; border-radius: 5px; cursor: pointer; margin-left: 5px; font-size: 16px; color: white; font-weight: bold;">
                Search
            </button>
        </div>

        <!-- User Account and Links Section -->
        <div style="flex: 2; display: flex; justify-content: flex-end; align-items: center; gap: 20px;">
            <!-- User Authentication Links -->
            @auth
                <div style="display: flex; align-items: center; color: white;">
                    <span style="margin-right: 10px; padding-right: 30px;">Welcome, {{ auth()->user()->name }}</span>
                    <a href="{{ url('/logout') }}" style="text-decoration: none; color: white; padding-right: 30px;">Logout</a>
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ url('/admin/dashboard') }}" style="text-decoration: none; color: white;">Dashboard</a>
                    @endif
                </div>
            @else
                <div style="color: white;">
                    <a href="{{ route('login') }}" style="text-decoration: none; color: white;">Login</a> |
                    <a href="{{ route('register') }}" style="text-decoration: none; color: white;">Register</a>
                </div>
            @endauth

            <!-- Cart Icon -->
            <div style="position: relative;">
                <a href="{{ url('/cart') }}" style="color: white; text-decoration: none;">
                    <img src="{{ asset('images/cart.png') }}" alt="Cart" style="width: 40px; height: 40px;">
                    <span style="position: absolute; top: -5px; right: -5px; background-color: #ff6a00; color: white; padding: 2px 6px; font-size: 12px; border-radius: 50%;">0</span>
                </a>
            </div>
        </div>
    </div>
</header>


    <!-- Main Content Section -->
    <main style="padding: 2rem; text-align: center;">
        @yield('content')
    </main>

    <!-- Footer -->
<footer style="background-color: #f8f8f8; padding: 30px 0; font-family: Arial, sans-serif; color: #333;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Footer Top Section -->
        <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
            <!-- Links Section 1 -->
            <div style="flex: 1; margin-right: 40px; min-width: 200px;">
                <h3 style="font-size: 16px; font-weight: bold; margin-bottom: 15px;">Customer Service</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: #333; text-decoration: none; margin-bottom: 8px; display: block;">Help Center</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; margin-bottom: 8px; display: block;">Track Order</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; margin-bottom: 8px; display: block;">Return & Refund</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; margin-bottom: 8px; display: block;">Shipping & Delivery</a></li>
                </ul>
            </div>
            
            <!-- Links Section 2 -->
            <div style="flex: 1; margin-right: 40px; min-width: 200px;">
                <h3 style="font-size: 16px; font-weight: bold; margin-bottom: 15px;">About Us</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: #333; text-decoration: none; margin-bottom: 8px; display: block;">About Mobile Lanka</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; margin-bottom: 8px; display: block;">Careers</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; margin-bottom: 8px; display: block;">Privacy Policy</a></li>
                    <li><a href="#" style="color: #333; text-decoration: none; margin-bottom: 8px; display: block;">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Social Media Section -->
            <div style="flex: 1; min-width: 200px;">
                <h3 style="font-size: 16px; font-weight: bold; margin-bottom: 15px;">Follow Us</h3>
                <div style="display: flex; gap: 10px;">
                    <a href="#" style="text-decoration: none;">
                        <img src="{{ asset('images/facebook.png') }}" alt="Facebook" style="width: 40px; height: 40px;">
                    </a>
                    <a href="#" style="text-decoration: none;">
                        <img src="{{ asset('images/instragram.png') }}" alt="Instagram" style="width: 40px; height: 40px;">
                    </a>
                    <a href="#" style="text-decoration: none;">
                        <img src="{{ asset('images/youtube.png') }}" alt="YouTube" style="width: 40px; height: 40px;">
                    </a>
                    <a href="#" style="text-decoration: none;">
                        <img src="{{ asset('images/twitter.png') }}" alt="Twitter" style="width: 40px; height: 40px;">
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div style="border-top: 1px solid #e1e1e1; margin-top: 30px; padding-top: 20px; text-align: center; color: #888;">
            <p style="font-size: 14px;">&copy; 2024 Mobile Lanka. All Rights Reserved.</p>
            <div>
                <a href="#" style="color: #888; text-decoration: none; margin-right: 15px;">Terms of Services</a>
                <a href="#" style="color: #888; text-decoration: none;">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>


    <script>
        // Hover effect for navigation links
        document.querySelectorAll('nav ul li a').forEach(link => {
            link.addEventListener('mouseenter', () => {
                link.style.color = 'yellow'; // Change color on hover
            });
            link.addEventListener('mouseleave', () => {
                link.style.color = 'white'; // Revert color on leave
            });
        });

        // Sticky header shadow effect on scroll
        const header = document.querySelector('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.3)';
            } else {
                header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
            }
        });
    </script>
</body>
</html>
