<nav class="bg-white shadow-md fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <img class="h-10" src="{{ asset('images/logo-banner.png') }}" alt="logo">
                </div>
                <div class="hidden md:ml-10 md:flex md:space-x-8">
                    <a href="/" class="nav-link text-gray-500 hover:text-primary-600 px-3 py-2 font-medium">Utama</a>
                    <a href="/resepi-terkini" class="nav-link text-gray-500 hover:text-primary-600 px-3 py-2 font-medium">Resepi Terkini</a>
                    <a href="/tentang-kami" class="nav-link text-gray-500 hover:text-primary-600 px-3 py-2 font-medium">Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white shadow-lg">
            <a href="/" class="nav-link block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-primary-600">Utama</a>
            <a href="/resepi-terkini" class="nav-link block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-primary-600">Resepi Terkini</a>
            <a href="/tentang-kami" class="nav-link block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-primary-600">Tentang Kami</a>
        </div>
    </div>
</nav>

 <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>

<style>
    @media (prefers-color-scheme: light) {
        input{
            color: black !important;
        }
    }

    [class^="select-dropdown-container-"] {
        background-color: white !important; /* Example style */
    }

    .hero-pattern {
        background: radial-gradient(circle, rgba(255,255,255,0) 0%, rgba(240,253,244,1) 100%);
    }
    .nav-link {
        transition: all 0.3s ease;
    }
    .nav-link:hover {
        transform: translateY(-2px);
    }
    .btn-primary {
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    .hero-img {
        animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    .recipe-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .recipe-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .recipe-card img {
        transition: transform 0.5s ease;
    }
    
    .recipe-card:hover img {
        transform: scale(1.05);
    }
    
    .feature-icon {
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        transform: rotate(10deg) scale(1.1);
        background-color: #fef3c7;
    }
    
    .floating {
        animation: floating 8s ease-in-out infinite;
    }
    
    @keyframes floating {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
        100% { transform: translateY(0px); }
    }
</style>

