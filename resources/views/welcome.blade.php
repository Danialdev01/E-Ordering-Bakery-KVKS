@extends('layouts.app')

@section('content')

    <section class="bg-gradient-to-r from-blue-50 to-indigo-50 py-16 px-4">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 mb-10 lg:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Streamline Your Ingredient Ordering Process</h1>
                <p class="text-lg text-gray-700 mb-8">A cutting-edge digital system that empowers seamless, paperless ordering for lecturers and PICs in bakery and pastry education.</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="/login" class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-6 rounded-lg text-center transition duration-300">Halaman Admin</a>
                </div>
            </div>
            <div class="lg:w-1/2 flex justify-center">
                <div class="relative w-full max-w-lg">
                    <div class="absolute -top-4 -left-4 w-32 h-32 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-2000"></div>
                    <div class="relative bg-white rounded-xl shadow-xl p-6">
                        @include('components.user-select-login')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Problem Statement Section -->
    <section id="problem" class="py-16 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Problems We Solve</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Traditional ingredient ordering systems face several challenges that we've addressed with our digital solution.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-copy text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Duplicate Orders</h3>
                    <p class="text-gray-600">Manual examination leads to duplicated ingredient orders, wasting resources and creating confusion.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-tasks text-yellow-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Separate Order Processes</h3>
                    <p class="text-gray-600">PICs need to create separate orders after collecting requirements from lecturers, increasing complexity.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-search-minus text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Order Omissions</h3>
                    <p class="text-gray-600">Lack of systematic ordering increases the possibility of missing critical ingredient orders.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Time-Consuming Process</h3>
                    <p class="text-gray-600">Manual generation of orders is inefficient and takes valuable time away from teaching.</p>
                </div>
            </div>
        </div>
    </section>


@endsection

