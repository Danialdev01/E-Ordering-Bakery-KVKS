<style>
    .dashboard-grid {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
        }
        
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            .sidenav {
                transform: translateX(-100%);
                position: fixed;
                z-index: 50;
                height: 100vh;
                transition: transform 0.3s ease;
            }
            .sidenav.active {
                transform: translateX(0);
            }
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 40;
            }
            .overlay.active {
                display: block;
            }
        }
        
        .nav-link {
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: #f0fdf4;
            border-left-color: #22c55e;
            color: #166534;
        }
        
        .nav-link:hover i, .nav-link.active i {
            color: #22c55e;
        }
        
        .card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.07), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background-color: #22c55e;
            transition: width 0.5s ease;
        }
        
        .meal-card {
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .meal-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .meal-card:hover img {
            transform: scale(1.05);
        }
        
        .meal-card img {
            transition: transform 0.5s ease;
        }
        
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .badge-primary {
            background-color: #dcfce7;
            color: #166534;
        }
        
        .badge-secondary {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .notification-dot {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #ef4444;
        }
</style>


<!-- Side Navigation -->
<div class="sidenav bg-white shadow-sm z-10">
    <div style='padding:1.1rem' class="border-gray-200 border-b flex items-center">
        <div class="flex items-center">
            <!-- <i class="fas fa-utensils text-primary-600 text-3xl mr-2"></i> -->
            <!-- <span class="text-xl font-bold text-gray-900">Resepi<span class="text-primary-600">Sihat</span></span> -->
            <img class="h-10" src="{{ asset('images/logo-banner.png') }}" alt="logo">
        </div>
    </div>

    <div class="py-4">
        <div class="px-2 text-xs uppercase text-gray-500 font-semibold mb-2 pl-5">Menu Utama</div>
        <a href="/dashboard/" class="nav-link flex items-center py-3 px-5 text-gray-700">
            <i class="fas fa-home text-gray-500 mr-3 w-5 text-center"></i>
            Dashboard
        </a>
        <a href="/dashboard/resepi" class="nav-link flex items-center py-3 px-5 text-gray-700">
            <i class="fas fa-book text-gray-500 mr-3 w-5 text-center"></i>
            Resepi
        </a>
        <a href="/dashboard/bahan-kering/" class="nav-link flex items-center py-3 px-5 text-gray-700">
            <i class="fa fa-file text-gray-500 mr-3 w-5 text-center"></i>
            Bahan Kering
        </a>
        <a href="/dashboard/barang-basah/" class="nav-link flex items-center py-3 px-5 text-gray-700">
            <i class="fa fa-file text-gray-500 mr-3 w-5 text-center"></i>
            Barang Basah
        </a>
        <a href="/user/permohonan-terdahulu" class="nav-link flex items-center py-3 px-5 text-gray-700">
            <i class="fa fa-file text-gray-500 mr-3 w-5 text-center"></i>
            Permohonan Terdahulu
        </a>
        <a href="/user/pembelian" class="nav-link flex items-center py-3 px-5 text-gray-700">
            <i class="fas fa-shopping-cart text-gray-500 mr-3 w-5 text-center"></i>
            Pembelian
        </a>
        
        <div class="px-2 text-xs uppercase text-gray-500 font-semibold mb-2 mt-6 pl-5">Tetapan</div>
        <a href="/user/akaun" class="nav-link flex items-center py-3 px-5 text-gray-700">
            <i class="fas fa-cog text-gray-500 mr-3 w-5 text-center"></i>
            Tetapan Akaun
        </a>

        <form method="POST" action="{{ route('custom.logout') }}">
            @csrf
            <button type="submit" name="signout" class="w-full nav-link flex items-center py-3 px-5 text-gray-700">
                <i class="fas fa-sign-out-alt text-gray-500 mr-3 w-5 text-center"></i>
                Log Keluar
            </button>
        </form>
    </div>
    
</div>