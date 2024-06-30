@extends('layouts.customer')

@section('title', 'Welcome to Shirona Salon and Bridal')

@section('content')

    <!-- Hero Section -->
    <div class="jumbotron text-center">
        <h1 class="display-4">Welcome to Our Bridal Wear Shop</h1>
        <p class="lead">Discover our exclusive collection of bridal wear.</p>
    </div>

    <!-- Item Section -->
    <div class="container">
        <div class="row limited-items show">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/dress1.jpg') }}" class="card-img-top" alt="Dress 1">
                    <div class="card-body">
                        <h5 class="card-title">Dress 1</h5>
                        <p class="card-text">A beautiful bridal dress.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/dress2.jpg') }}" class="card-img-top" alt="Dress 2">
                    <div class="card-body">
                        <h5 class="card-title">Dress 2</h5>
                        <p class="card-text">An elegant wedding gown.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row all-items">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/dress3.jpg') }}" class="card-img-top" alt="Dress 3">
                    <div class="card-body">
                        <h5 class="card-title">Dress 3</h5>
                        <p class="card-text">A stunning bridal dress with intricate details.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/dress4.jpg') }}" class="card-img-top" alt="Dress 4">
                    <div class="card-body">
                        <h5 class="card-title">Dress 4</h5>
                        <p class="card-text">A glamorous wedding gown for the special day.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
