@extends('layouts.app')

@section('content')
<div class="main massage">
    <div class="container">
        <div class="top-block">
            <h2 class="title-items bold-700">Корзина</h2>
            <a href="{{ url('/account/' . $id . '/cart/add_prod') }}"><button class="btn btn-primary">Добавить товар(тест)</button></a>
        </div>
        <div class="basket">
            <ul class="list-item-2">
                <li class="item-2">
                    <div class="col text-left">
                        Сумма покупок ( {{ $cart_count }} шт. ): <span>{{ $cart_sum }} $</span>
                    </div>
                    <div class="col-sm-3">
                        <div class="basket-action">
                            <a href="admin-sales.html" class="btn btn-secondary">Продолжить оформление заказа</a>
                        </div>
                    </div>
                </li>
                @if ($cart_items->isNotEmpty())
                    @foreach ($cart_items as $cart_item)

                    <li class="item-2">
                        <div class="col d-flex">
                            <div class="img-item-2"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                            <div class="text-item-2 w-100">
                                <h3 class="title-items-2 bold-700">{{ $cart_item->product_title }}</h3><br/>
                                <p>{{ $cart_item->product_description }}</p><br/>
                                <dl class="d-flex w-50 flex-wrap">
                                    <dt class="w-50 ">Цена:</dt>
                                    <dd class="w-50">{{ $cart_item->price }} $</dd>
                                    <dt class="w-50">Доставка:</dt>
                                    <dd class="w-50">{{ $cart_item->delivery }}</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <!-- Удалить из Корзины -->
                            <form action="{{ url('/account/' . $id . '/cart/' . $cart_item->id . '/add_favorite') }}" method="POST" class="basket-action">
                            @csrf
                                <input type="hidden" name="product_id" value="{{ $cart_item->id }}">
                                <input type="hidden" name="user_id" value="{{ $id }}">
                                <div class="form-group m-0">
                                    <button class="btn btn-secondary btn-block">Удалить</button>
                                </div>
                            </form>
                            <!-- Удалить из Корзины -->
                            <form action="{{ url('/account/' . $id . '/cart/' . $cart_item->id . '/delete') }}" method="POST" class="basket-action">
                            @csrf
                                <input type="hidden" name="product_id" value="{{ $cart_item->id }}">
                                <div class="form-group m-0">
                                    <button class="btn btn-secondary btn-block">Удалить</button>
                                </div>
                            </form>

                        </div>
                    </li>

                    @endforeach

                @else
                EMPTY CART
                @endif
                <!-- <li class="item-2">
                    <div class="col d-flex">
                        <div class="img-item-2"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                        <div class="text-item-2 w-100">
                            <h3 class="title-items-2 bold-700">Giving information on its origins</h3><br/>
                            <p>Giving information on its origins information on its origins information on its origins information on its origins information on its origins</p><br/>
                            <dl class="d-flex w-50 flex-wrap">
                                <dt class="w-50 ">Цена:</dt>
                                <dd class="w-50">1 119,75 $</dd>
                                <dt class="w-50">Доставка:</dt>
                                <dd class="w-50">Включена</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <form class="basket-action">
                            <div class="form-group">
                                <button class="btn btn-secondary btn-block">Добавить в избранное</button>
                            </div>
                            <div class="form-group m-0">
                                <button class="btn btn-secondary btn-block">Удалить</button>
                            </div>
                        </form>

                    </div>
                </li> -->
                <!-- <li class="item-2">
                    <div class="col d-flex">
                        <div class="img-item-2"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                        <div class="text-item-2 w-100">
                            <h3 class="title-items-2 bold-700">Giving information on its origins</h3><br/>
                            <p>Giving information on its origins information on its origins information on its origins information on its origins information on its origins</p><br/>
                            <dl class="d-flex w-50 flex-wrap">
                                <dt class="w-50 ">Цена:</dt>
                                <dd class="w-50">1 119,75 $</dd>
                                <dt class="w-50">Доставка:</dt>
                                <dd class="w-50">Включена</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <form class="basket-action">
                            <div class="form-group">
                                <button class="btn btn-secondary btn-block">Добавить в избранное</button>
                            </div>
                            <div class="form-group m-0">
                                <button class="btn btn-secondary btn-block">Удалить</button>
                            </div>
                        </form>

                    </div>
                </li> -->
                <li class="item-2 text-left w-100">
                    <ul class="d-block w-100">
                        <li class="d-flex">
                            <div class="col text-right">Итого (1 пункт): </div>
                            <div class="col-3">{{ $cart_sum }}$</div>
                        </li>
                        <li  class="d-flex">
                            <div class="col text-right">Доставка: </div>
                            <div class="col-3">Включена</div>
                        </li>
                        <li  class="d-flex">
                            <div class="col text-right">Предполагаемая сумма: </div>
                            <div class="col-3"><b>{{ $cart_sum }} $</b></div>
                        </li>
                    </ul>
                </li>
                <li class="item-2">
                    <div class="col"></div>
                    <div class="col-sm-3">
                        <div class="basket-action">
                            <a href="admin-sales.html" class="btn btn-secondary">Продолжить оформление заказа</a>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</div>
@endsection