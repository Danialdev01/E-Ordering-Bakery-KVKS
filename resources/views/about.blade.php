@extends('layouts.app')

@section('content')

     <!-- Features Section -->
    <section id="features" class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Bagaimana E-OrderingKVKS berfungsi ?</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Our streamlined process makes ingredient ordering simple, efficient, and error-free.</p>
            </div>
            <div class="flex flex-col lg:flex-row items-center mb-12">
                <div class="lg:w-1/2 mb-8 lg:mb-0 lg:pr-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Seamless Lecturer Order Creation</h3>
                    <p class="text-gray-600 mb-4">Lecturers can easily create ingredient orders through an intuitive interface, with pre-loaded templates for common recipes.</p>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Pre-populated ingredient lists for standard recipes</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Easy quantity adjustments based on class size</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Automated calculations for total requirements</span>
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img src="https://cdn.pixabay.com/photo/2020/05/18/16/17/social-media-5187243_1280.png" alt="Lecturer Interface" class="rounded-lg">
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 order-2 lg:order-1">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img src="https://cdn.pixabay.com/photo/2019/07/14/16/27/pen-4337521_1280.jpg" alt="PIC Dashboard" class="rounded-lg">
                    </div>
                </div>
                <div class="lg:w-1/2 mb-8 lg:mb-0 lg:pl-12 order-1 lg:order-2">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Centralized PIC Management</h3>
                    <p class="text-gray-600 mb-4">PICs receive all lecturer orders in a centralized dashboard, with tools to consolidate, adjust, and submit final orders.</p>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Automated consolidation of multiple orders</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Real-time inventory tracking and alerts</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Direct submission to suppliers with one click</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section id="impact" class="py-16 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Impact on Teaching and Learning</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">IngredientPro doesn't just streamline ordering - it enhances the educational experience.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Real-World Learning Example</h3>
                    <p class="text-gray-600 mb-4">Our system provides students with a realistic example of professional ingredient management and ordering processes.</p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-chart-line text-blue-600 mt-1 mr-3"></i>
                            <span>Students learn industry-standard procurement practices</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-users text-blue-600 mt-1 mr-3"></i>
                            <span>Exposure to collaborative ordering workflows</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-leaf text-blue-600 mt-1 mr-3"></i>
                            <span>Understanding of sustainable, paperless operations</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-gray-50 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">More Time for Teaching</h3>
                    <p class="text-gray-600 mb-4">Lecturers regain valuable time previously spent on manual ordering tasks, allowing better focus on students.</p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-clock text-blue-600 mt-1 mr-3"></i>
                            <span>Reduce ordering time by up to 70%</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-graduation-cap text-blue-600 mt-1 mr-3"></i>
                            <span>More time for student interaction and mentoring</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-lightbulb text-blue-600 mt-1 mr-3"></i>
                            <span>Focus on curriculum development and innovation</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection


