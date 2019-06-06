@extends('layouts.app')

@section('content')
<div class="main main">
    <div class="">
        <ul class="menu-main container">
        <li>Женское <i class="fas fa-chevron-down"></i></li>
        <li>Мужское <i class="fas fa-chevron-down"></i></li>
        <li>Детское <i class="fas fa-chevron-down"></i></li>
        <li>О нас <i class="fas fa-chevron-down"></i></li>
        <li>Бренды <i class="fas fa-chevron-down"></i></li>
        </ul>
        <div class="welcome-block">
            <div class="container">
                <h2>Готовы очистить шкаф?</h2>
                <a href="#">Выставить сейчас ?</a><br/>
                <a href="#">Как это работае ?</a>
            </div>
        </div>
        <div class="block-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 sidebar">
                        <p class="text-sidebar">
                            ПРИСОЕДИНЯЙТЕСЬ К НАМ СЕГОДНЯ! Продажа и покупка предметов гардероба секонд хенд. Перечислите то, что вы не носите и продавайте бесплатно!
                        <br/><a href="#" data-toggle="modal" data-target="#exampleModal">Создать аккаунт</a>
                        </p>
                    </div>
                    <div class="col-md-9 content">
                        <ul class="list-item-products">

                            <!-- Проверка, есть ли продажи?  -->
                            @if ($all_products->isNotEmpty())
                                @foreach ($all_products as $product)

                                <li class="item-product">
                                    <div class="block-item-product">
                                        <h3><a href="#">{{ $product->seller_name }}</a></h3>
                                        <a href="#"><img src="{{ asset('images/2.png') }}" alt=""></a>
                                        <h4 class="price-item-product">{{ $product->price }} $ <span class="like"><i class="fas fa-heart"></i> 7</span></h4>
                                        <h4 class="size-product"> Размер </h4>
                                        <h3 class="name-product"><a href="#">{{ $product->description }}</a></h3>
                                    </div>
                                </li>

                                @endforeach
                            @else
                                <div style="text-align: center;" class="text-item-2">
                                    <h3 class="title-items-2 bold-700">NO SALES YET</h3><br/>
                                </div>
                            @endif

                            <!-- <li class="item-product">
                                <div class="block-item-product">
                                    <h3><a href="#">Имя продавца</a></h3>
                                    <a href="#"><img src="{{ asset('images/2.png') }}" alt=""></a>
                                    <h4 class="price-item-product">156 $ <span class="like"><i class="fas fa-heart"></i> 7</span></h4>
                                    <h4 class="size-product"> Размер </h4>
                                    <h3 class="name-product"><a href="#">Название товара</a></h3>
                                </div>
                            </li>
                            <li class="item-product">
                                <div class="block-item-product">
                                    <h3><a href="#">Имя продавца</a></h3>
                                    <a href="#"><img src="{{ asset('images/2.png') }}" alt=""></a>
                                    <h4 class="price-item-product">156 $ <span class="like"><i class="fas fa-heart"></i> 7</span></h4>
                                    <h4 class="size-product"> Размер </h4>
                                    <h3 class="name-product"><a href="#">Название товара</a></h3>
                                </div>
                            </li>
                            <li class="item-product">
                                <div class="block-item-product">
                                    <h3><a href="#">Имя продавца</a></h3>
                                    <a href="#"><img src="{{ asset('images/2.png') }}" alt=""></a>
                                    <h4 class="price-item-product">156 $ <span class="like"><i class="fas fa-heart"></i> 7</span></h4>
                                    <h4 class="size-product"> Размер </h4>
                                    <h3 class="name-product"><a href="#">Название товара</a></h3>
                                </div>
                            </li>
                            <li class="item-product">
                                <div class="block-item-product">
                                    <h3><a href="#">Имя продавца</a></h3>
                                    <a href="#"><img src="{{ asset('images/2.png') }}" alt=""></a>
                                    <h4 class="price-item-product">156 $ <span class="like"><i class="fas fa-heart"></i> 7</span></h4>
                                    <h4 class="size-product"> Размер </h4>
                                    <h3 class="name-product"><a href="#">Название товара</a></h3>
                                </div>
                            </li>
                            <li class="item-product">
                                <div class="block-item-product">
                                    <h3><a href="#">Имя продавца</a></h3>
                                    <a href="#"><img src="{{ asset('images/2.png') }}" alt=""></a>
                                    <h4 class="price-item-product">156 $ <span class="like"><i class="fas fa-heart"></i> 7</span></h4>
                                    <h4 class="size-product"> Размер </h4>
                                    <h3 class="name-product"><a href="#">Название товара</a></h3>
                                </div>
                            </li>
                            <li class="item-product">
                                <div class="block-item-product">
                                    <h3><a href="#">Имя продавца</a></h3>
                                    <a href="#"><img src="{{ asset('images/2.png') }}" alt=""></a>
                                    <h4 class="price-item-product">156 $ <span class="like"><i class="fas fa-heart"></i> 7</span></h4>
                                    <h4 class="size-product"> Размер </h4>
                                    <h3 class="name-product"><a href="#">Название товара</a></h3>
                                </div>
                            </li>
                            <li class="item-product">
                                <div class="block-item-product">
                                    <h3><a href="#">Имя продавца</a></h3>
                                    <a href="#"><img src="{{ asset('images/2.png') }}" alt=""></a>
                                    <h4 class="price-item-product">156 $ <span class="like"><i class="fas fa-heart"></i> 7</span></h4>
                                    <h4 class="size-product"> Размер </h4>
                                    <h3 class="name-product"><a href="#">Название товара</a></h3>
                                </div>
                            </li>
                            <li class="item-product">
                                <div class="block-item-product">
                                    <h3><a href="#">Имя продавца</a></h3>
                                    <a href="#"><img src="{{ asset('images/2.png') }}" alt=""></a>
                                    <h4 class="price-item-product">156 $ <span class="like"><i class="fas fa-heart"></i> 7</span></h4>
                                    <h4 class="size-product"> Размер </h4>
                                    <h3 class="name-product"><a href="#">Название товара</a></h3>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
