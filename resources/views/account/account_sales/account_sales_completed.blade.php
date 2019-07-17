@extends('layouts.app')

@section('content')
<div class="main sales">
    <div class="container">
        <ul class="top-menu-sales">
            <li>Всего подано ($) <span>800.00 $</span></li>
            <li>Всего пpодаж <span>20</span></li>
            <li>Доступно к снятию <span>300.00 $</span>Управление выплатами  <a href="#" class="fas fa-chevron-right"></a></li>
        </ul>
        <ul class="bottom-menu-sales">
            <li><a href="{{ url('/account/' . $id . '/sales/all') }}">Все продажи</a></li>
            <li><a href="{{ url('/account/' . $id . '/sales/unconfirmed') }}">Ожидает подтверждения</a></li>
            <li class="active"><a href="{{ url('/account/' . $id . '/sales/completed') }}">Завершено</a></li>
        </ul>
        <table class="list-item-2">
            <tr><td>Дата продажи</td><td>Название</td><td>Стоимость</td><td>Статус заказа</td><td>Действие</td></tr>
            <tr class="item-2">
                <td class="data-item-2"><div>21.05.19<span>14:47</span></div>  <div class="img-item-2"><img src="{{ asset('/images/3.jpg') }}" alt=""></div></td>

                <td class="text-item-2">
                    <h3 class="title-items-2 bold-700">Название товара</h3>
                    <p>Reference site about Lorem Ipsum, giving information on its origins, as.</p>
                    <span>Имя продавца</span>
                </td>
                <td class="item-price bold-700">560.00$</td>
                <td><span class="bold-700">Завершено</span><br/> Заказ отправлен</td>
                <td class="action">
                    <span><span class="active">Заказ подтвержден</span></span>
                    <span><span >В ожидании подтверждения</span></span>
                    <span><span>Заказ отменен</span></span>
                    <span><span>Ведется суд по товару</span></span>
                </td>
            </tr>
            <tr class="item-2">
                <td class="data-item-2"><div>21.05.19<span>14:47</span></div>  <div class="img-item-2"><img src="{{ asset('/images/3.jpg') }}" alt=""></div></td>

                <td class="text-item-2">
                    <h3 class="title-items-2 bold-700">Название товара</h3>
                    <p>Reference site about Lorem Ipsum, giving information on its origins, as.</p>
                    <span>Имя продавца</span>
                </td>
                <td class="item-price bold-700">52.00$</td>
                <td><span class="bold-700">Завершено</span><br/> Заказ отправлен</td>
                <td class="action">
                    <span><span class="active">Заказ подтвержден</span></span>
                    <span><span>В ожидании подтверждения</span></span>
                    <span><span>Заказ отменен</span></span>
                    <span><span>Ведется суд по товару</span></span>
                </td>
            </tr>
            <tr class="item-2">
                <td class="data-item-2"><div>21.05.19<span>14:47</span></div>  <div class="img-item-2"><img src="{{ asset('/images/3.jpg') }}" alt=""></div></td>

                <td class="text-item-2">
                    <h3 class="title-items-2 bold-700">Название товара</h3>
                    <p>Reference site about Lorem Ipsum, giving information on its origins, as.</p>
                    <span>Имя продавца</span>
                </td>
                <td class="item-price bold-700">187.00$</td>
                <td><span class="bold-700">Завершено</span><br/> Заказ отправлен</td>
                <td class="action">
                    <span><span class="active">Заказ подтвержден</span></span>
                    <span><span>В ожидании подтверждения</span></span>
                    <span><span>Заказ отменен</span></span>
                    <span><span>Ведется суд по товару</span></span>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection