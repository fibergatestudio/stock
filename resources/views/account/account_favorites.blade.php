@extends('layouts.app')

@section('content')
<div class="main favorites">
    <div class="container">
        <div class="top-block">
            <h2 class="title-items bold-700">Избранное</h2>
            <form class="form-inline form-search">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> <a href="#"><i class="fas fa-search"></i></a>
            </form>
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Фільтр</option>
                    <option></option>
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>
        </div>

        <ul class="list-item">
            <li class="item">
                <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <h4 class="text-item"><a href="#">Giving information on its origins</a></h4>
                <h5 class="item-price bold-700">150.00$</h5>
            <li>
            <li class="item">
                <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <h4 class="text-item"><a href="#">Giving information on its origins</a></h4>
                <h5 class="item-price bold-700">150.00$</h5>
            <li>
            <li class="item">
                <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <h4 class="text-item"><a href="#">Giving information on its origins</a></h4>
                <h5 class="item-price bold-700">150.00$</h5>
            <li>
            <li class="item">
                <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <h4 class="text-item"><a href="#">Giving information on its origins</a></h4>
                <h5 class="item-price bold-700">150.00$</h5>
            <li>
            <li class="item">
                <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <h4 class="text-item"><a href="#">Giving information on its origins</a></h4>
                <h5 class="item-price bold-700">150.00$</h5>
            <li>
            <li class="item">
                <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <h4 class="text-item"><a href="#">Giving information on its origins</a></h4>
                <h5 class="item-price bold-700">150.00$</h5>
            <li>
            <li class="item">
                <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <h4 class="text-item"><a href="#">Giving information on its origins</a></h4>
                <h5 class="item-price bold-700">150.00$</h5>
            <li>
            <li class="item">
                <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <h4 class="text-item"><a href="#">Giving information on its origins</a></h4>
                <h5 class="item-price bold-700">150.00$</h5>
            <li>
            <li class="item">
                <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <h4 class="text-item"><a href="#">Giving information on its origins</a></h4>
                <h5 class="item-price bold-700">150.00$</h5>
            <li>
            <li class="item">
                <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <h4 class="text-item"><a href="#">Giving information on its origins</a></h4>
                <h5 class="item-price bold-700">150.00$</h5>
            <li>
        </ul>
    </div>
</div>
@endsection