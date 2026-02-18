@extends("frontend.layouts.master")

@section('head')
    <title>Our Special Menu - Fresheat</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
@endsection

@section('content')
<section class="food-menu-section py-5 bg-light">
    <div class="container py-5">
        <div class="section-title text-center mb-5">
            <h6 class="text-danger fw-bold text-uppercase">Our Popular Menu</h6>
            <h2 class="display-5 fw-bold">Choose Your Favorite Food</h2>
            <div class="mx-auto" style="width: 70px; height: 3px; background: #ffc107;"></div>
        </div>

        <div class="row g-4">
            @php
                $staticFoods = [
                    ['name' => 'Margherita Pizza', 'price' => '750', 'img' => 'https://images.pexels.com/photos/1146760/pexels-photo-1146760.jpeg?auto=compress&cs=tinysrgb&w=400', 'desc' => 'Fresh tomato sauce, mozzarella and basil.'],
                    ['name' => 'Crispy Zinger Burger', 'price' => '280', 'img' => 'https://images.pexels.com/photos/1639557/pexels-photo-1639557.jpeg?auto=compress&cs=tinysrgb&w=400', 'desc' => 'Crunchy chicken with spicy mayo and lettuce.'],
                    ['name' => 'White Sauce Pasta', 'price' => '350', 'img' => 'https://images.pexels.com/photos/1437267/pexels-photo-1437267.jpeg?auto=compress&cs=tinysrgb&w=400', 'desc' => 'Creamy pasta with mushrooms and herbs.'],
                    ['name' => 'Fried Chicken', 'price' => '450', 'img' => 'https://images.pexels.com/photos/2338407/pexels-photo-2338407.jpeg?auto=compress&cs=tinysrgb&w=400', 'desc' => 'Crispy deep fried chicken with secret spices.'],
                    ['name' => 'Club Sandwich', 'price' => '220', 'img' => 'https://images.pexels.com/photos/1600711/pexels-photo-1600711.jpeg?auto=compress&cs=tinysrgb&w=400', 'desc' => 'Healthy chicken with fresh veggies.'],
                    ['name' => 'Thai Noodles', 'price' => '320', 'img' => 'https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=400', 'desc' => 'Authentic Thai style spicy noodles.'],
                    ['name' => 'Cold Coffee', 'price' => '180', 'img' => 'https://images.pexels.com/photos/312418/pexels-photo-312418.jpeg?auto=compress&cs=tinysrgb&w=400', 'desc' => 'Rich chocolate mixed with coffee.'],
                    ['name' => 'Chocolate Shake', 'price' => '200', 'img' => 'https://images.pexels.com/photos/103566/pexels-photo-103566.jpeg?auto=compress&cs=tinysrgb&w=400', 'desc' => 'Thick creamy chocolate shake.']
                ];
            @endphp

            @foreach($staticFoods as $food)
            <div class="col-lg-3 col-md-6">
                <div class="menu-card p-3 shadow-sm bg-white rounded-4 text-center border-0 h-100 transition-all">
                    <div class="img-wrapper overflow-hidden rounded-circle mx-auto mb-3" style="width: 160px; height: 160px; border: 4px solid #f8f9fa;">
                        <img src="{{ $food['img'] }}" 
                             class="w-100 h-100 object-fit-cover hover-zoom" 
                             alt="{{ $food['name'] }}"
                             onerror="this.src='https://via.placeholder.com/400x400?text=Food+Image'">
                    </div>
                    <h5 class="fw-bold mb-1">{{ $food['name'] }}</h5>
                    <p class="small text-muted mb-2" style="height: 40px; overflow: hidden;">{{ $food['desc'] }}</p>
                    <h5 class="text-danger fw-bold mb-3">{{ $food['price'] }} BDT</h5>
                    
                    @auth
                        <a href="{{ route('customer.dashboard') }}" class="btn btn-warning rounded-pill w-100 fw-bold">ADD TO CART</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-warning rounded-pill w-100 fw-bold">ADD TO CART</a>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .menu-card:hover { transform: translateY(-10px); transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
    .hover-zoom { transition: 0.5s; }
    .hover-zoom:hover { transform: scale(1.1); }
</style>

@endsection