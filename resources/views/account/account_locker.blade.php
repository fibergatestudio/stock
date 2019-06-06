@extends('layouts.app')

@section('content')
<div class="menu-bottom">
  <div class="container">
    <div class="edit">
      <a href="#"><i class="fas fa-pencil-alt"></i></a>
    </div>
    <div class="info-user">
      <div class="block-photo-user"><img src="{{ asset('images/2.png') }}" alt=""><a href="#"><i class="fas fa-camera"></i></a></div>
      <div class="block-name-user">
        <h3 class="name-user bold-700">{{ Auth::user()->name }} <a href="#"><i class="fas fa-pencil-alt"></i></a></h3><br>
        <h4>Reference site about Lorem ipsum</h4><br>
        <span>Add a discription</span>
      </div>
    </div>
    <div class="info-tab">
      <ul>
        <li><span class="quantity-items bold-700">15</span><h4>Items</h4></li>
        <li><span class="quantity-followers bold-700">200</span><h4>Followers</h4></li>
        <li><span class="quantity-following bold-700">462</span><h4>Following</h4></li>
      </ul>
    </div>
  </div>
</div>
<div class="main cupboard">
  <div class="container">
    <h2 class="title-items bold-700">Мой шкаф</h2>
    <ul class="list-item">

            <!-- Проверка, есть ли продажи?  -->
            @if ($account_locker->isNotEmpty())
                @foreach ($account_locker as $locker)

                <li class="item">
                  <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                  <h4 class="text-item"><a href="#">{{ $locker->description }}</a></h4>
                  <h5 class="item-price bold-700">{{ $locker->price }}$</h5>
                <li>

                @endforeach
            @else
              <h4 class="text-item">NO ITEMS IN LOCKER</h4>
            @endif


      <!-- <li class="item">
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
      <li> -->
    </ul>
  </div>
</div>
@endsection