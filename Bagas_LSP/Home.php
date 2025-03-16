<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Travel</title>
    <link rel="shortcut icon" href="assets/Logo.png" type="image/x-icon">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/f248171b51.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/Style/Style.css">
</head>

<body>
    <!-- nav bar section -->
    <div class="bg-cover bg-center min-h-screen" style="background-image: url('assets/Background.jpg');">
        <div x-data="{ atTop: true, open: false }" x-on:scroll.window="atTop = window.pageYOffset <= 10">

            <!-- Navbar -->
            <nav class="fixed w-full top-0 z-50 transition-all duration-300"
                :class="{ 'bg-white shadow-lg': !atTop, 'bg-transparent': atTop }">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <a href="#" class="text-xl font-bold text-gray-800">
                                <img src="assets/Logo.png" class="w-20 h-20" alt="">
                            </a>
                        </div>

                        <div class="hidden md:flex space-x-6 items-center">
                            <a href="#" class="text-gray-700 hover:text-purple-600 transition">Beranda</a>
                            <a href="#" class="text-gray-700 hover:text-purple-600 transition">Tentang Kami</a>
                            <a href="#" class="text-gray-700 hover:text-purple-600 transition">Contact</a>

                            <!-- Jika user login -->
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <button class="relative focus:outline-none">
                                    <i class="fas fa-bell text-gray-700 text-lg"></i>
                                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1">3</span>
                                </button>
                                <div class="relative" @click.away="open = false">
                                    <button @click="open = !open" class="focus:outline-none flex items-center space-x-2">
                                        <img src="https://randomuser.me/api/portraits/men/12.jpg" class="w-8 h-8 rounded-full" />
                                    </button>
                                    <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg">
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                                        <a href="Dashboard.php" class="block px-4 py-2 hover:bg-gray-200">Dashboard Tiket</a>
                                        <a href="auth/Logout.php" class="block px-4 py-2 hover:bg-gray-200">Logout</a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="auth/Login.php" class="text-white bg-[#225070] px-4 py-2 rounded-xl hover:text-blue-500 hover:bg-white transition">Login</a>
                                <a href="auth/Register.php" class="text-blue-500 bg-white px-4 py-2 rounded-xl hover:text-white hover:bg-[#225070] transition">Register</a>
                            <?php endif; ?>
                        </div>

                        <div class="md:hidden flex items-center">
                            <button @click="open = !open" class="focus:outline-none">
                                <i class="fas fa-bars text-xl text-gray-700"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- Content -->
            <div class="container mx-auto px-4 py-20 md:py-24 lg:py-32 flex justify-center">
                <div class="max-w-4xl w-full p-8 md:p-12 rounded-lg shadow-lg backdrop-blur-md bg-white/10 border border-white/20">
                    <h1 class="text-3xl font-semibold text-[#225070]">Blue Travel</h1>
                    <p class="font-regular text-xl mb-8 mt-4">Selamat datang di Blue Travel - teman setia perjalanan Anda!
                        Dari liburan keluarga hingga petualangan solo, kami menyediakan paket perjalanan terbaik yang sesuai dengan impian Anda. Mari wujudkan momen indah bersama kami!</p>
                    <button class="relative px-8 py-4 font-bold text-white rounded-lg group overflow-hidden">
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-[#225070] to-[#4e95b1] opacity-70 blur-xl group-hover:opacity-100 transition-opacity duration-300"></span>
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-[#225070] to-[#225070] opacity-90"></span>
                        <span class="absolute inset-0 w-1/4 h-full bg-white/20 skew-x-12 transform -translate-x-full group-hover:translate-x-[400%] transition-transform duration-1000"></span>
                        <span class="relative flex items-center gap-2">
                            <i class="fa-solid fa-plane w-5 h-5 -rotate-45"></i>
                            <span class="tracking-wider">FLY NOW</span>
                        </span>
                        <span class="absolute inset-0 w-full h-full border border-cyan-300/50 rounded-lg"></span>
                    </button>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>
    <script src="assets/Script/Script.js"></script>
</body>

</html>