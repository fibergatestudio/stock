@extends('layouts.app')

@section('content')
<div class="main buy">
    <div class="container">
        <h2 class="title-items bold-700">Мои покупки</h2>
        <ul class="list-item-2">
            <li><div>Дата продажи</div><div>Название</div><div>Цена</div></li>

            <!-- Проверка, есть ли продажи?  -->
            @if ($account_purchases->isNotEmpty())
                @foreach ($account_purchases as $purchase)

                    <li class="item-2">
                    <span class="data-item-2">{{ $purchase->purchase_date }}</span>
                    <div class="img-item-2"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                    <div class="text-item-2">
                        <h3 class="title-items-2 bold-700">{{ $purchase->title }}</h3><br/>
                        <p>{{ $purchase->description }}</p><br/>
                        <span>{{ $purchase->seller_name }}</span>
                    </div>
                    <h5 class="item-price bold-700">{{ $purchase->price }}$</h5>
                    </li>
                @endforeach
            @else
            <li class="item-2">
                <span class="data-item-2"></span>
                <div style="text-align: center;" class="text-item-2">
                    <h3 class="title-items-2 bold-700">NO PURCHASES YET</h3><br/>
                </div>
            </li>
            @endif
        </ul>

    </div>
</div>
@endsection