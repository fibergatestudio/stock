@extends('layouts.app')

@section('content')
<div class="main favorites">
    <div class="container">
        <div class="top-block">
            <h2 class="title-items bold-700">Избранное</h2>
            <div class="right-block">
                <form class="form-inline form-search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> <a href="#"><i class="fas fa-search"></i></a>
                </form>
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Актуальность</option>
                        <option>Цена: от низкой к высокой</option>
                        <option>Цена: по убыванию</option>
                        <option>Недавно добавленный</option>
                    </select>
                </div>
            </div>

        </div>

        <ul class="list-item">
        @if ($likes->isNotEmpty())
            @foreach ($likes as $like)
                <!-- <li class="item">
                    <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                    <h4 class="text-item"><a href="#">{{ $like->product_name }}</a></h4>
                    <h5 class="item-price bold-700">{{ $like->product_price }}$</h5>
                <li> -->

                <li class="block-item">
                <div class="item">
                    <div class="img-item">
                        <div class="block-edit">
                            <i class="fas fa-chevron-down button-edit-product"></i>
                            <ul class="edit-item-product">
                                <li><a href="#"><i class="fas fa-pen"> </i>  Редактировать</a></li>
                                <li><a href="#"><i class="fas fa-times"> </i>  Удалить</a></li>
                            </ul>
                        </div>

                        <img src="{{ asset('/images/3.jpg') }}" alt="">
                    </div>
                    <h4 class="name-item"><a href="#">{{ $like->product_name }}</a></h4>
                    <span class="brand">бренд</span> <span class="size">/ размер</span>
                    <span class="data-product"><span>18.05.19 </span><span>Дата публикации</span></span>
                    <div class="block-price-item">
                        <a href="#" class="menu-item"><i class="icon icon-output"></i></a>
                        <div class="">
                            <span class="new-price"> {{ $like->product_price }}$ </span>
                            <span class="old-price"> 200.00$ </span>
                        </div>
                    </div>
                </div>
            <li>
            @endforeach
        @else
            NOLIKES
        @endif

        </ul>
    </div>
</div>
@endsection