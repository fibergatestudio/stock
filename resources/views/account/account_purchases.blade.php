@extends('layouts.app')

@section('content')
<div class="main buy">
    <div class="container">
        <h2 class="title-items bold-700">Мои покупки</h2>
        <ul class="list-item-2">
            <li><div>Дата продажи</div><div>Название</div><div>Цена</div></li>
            <li class="item-2">
                <span class="data-item-2">21 июнь 2015</span>
                <div class="img-item-2"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <div class="text-item-2">
                    <h3 class="title-items-2 bold-700">Giving information on its origins</h3><br/>
                    <p>Giving information on its origins information on its origins information on its origins information on its origins information on its origins</p><br/>
                    <span>Имя продавца</span>
                </div>
                <h5 class="item-price bold-700">187.00$</h5>
            </li>
            <li class="item-2">
                <span class="data-item-2">21 июнь 2015</span>
                <div class="img-item-2"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <div class="text-item-2">
                    <h3 class="title-items-2 bold-700">Giving information on its origins</h3><br/>
                    <p>Giving information on its origins information on its origins information on its origins information on its origins information on its origins</p><br/>
                    <span>Имя продавца</span>
                </div>
                <h5 class="item-price bold-700">400.00$</h5>
            </li>
            <li class="item-2">
                <span class="data-item-2">21 июнь 2015</span>
                <div class="img-item-2"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <div class="text-item-2">
                    <h3 class="title-items-2 bold-700">Giving information on its origins</h3><br/>
                    <p>Giving information on its origins information on its origins information on its origins information on its origins information on its origins</p><br/>
                    <span>Имя продавца</span>
                </div>
                <h5 class="item-price bold-700">187.00$</h5>
            </li>
            <li class="item-2">
                <span class="data-item-2">21 июнь 2015</span>
                <div class="img-item-2"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <div class="text-item-2">
                    <h3 class="title-items-2 bold-700">Giving information on its origins</h3><br/>
                    <p>Giving information on its origins information on its origins information on its origins information on its origins information on its origins</p><br/>
                    <span>Имя продавца</span>
                </div>
                <h5 class="item-price bold-700">187.00$</h5>
            </li>
            <li class="item-2">
                <span class="data-item-2">21 июнь 2015</span>
                <div class="img-item-2"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                <div class="text-item-2">
                    <h3 class="title-items-2 bold-700">Giving information on its origins</h3><br/>
                    <p>Giving information on its origins information on its origins information on its origins information on its origins information on its origins</p><br/>
                    <span>Имя продавца</span>
                </div>
                <h5 class="item-price bold-700">187.00$</h5>
            </li>
        </ul>

    </div>
</div>
@endsection