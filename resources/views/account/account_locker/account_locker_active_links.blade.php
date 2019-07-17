@extends('layouts.app')

@section('content')

<div class="main active-link">
  <div class="container">
    <ul class="list-top-menu">
      <li><a href="{{ url('/account/' . $id . '/locker') }}">Мой шкаф</a></li>
      <li class="active"><a href="{{ url('/account/' . $id . '/locker/active_links') }}">Активные ссылки</a></li>
      <li><a href="{{ url('/account/' . $id . '/locker/drafts') }}">Черновики</a></li>
      <li><a href="{{ url('/account/' . $id . '/locker/deleted') }}">Удалены</a></li>
      <li><a href="{{ url('/account/' . $id . '/locker/sold_out') }}">Продано</a></li>
    </ul>
  </div>
  <div class="container">
    <div class="title-block">
      <h4>Активные ссылки</h4>
      <form class="form-inline form-search">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Поиск"> <a href="#"><i class="fas fa-search"></i></a>
      </form>
    </div>

    <ul class="list-item">
        @if ($account_locker->isNotEmpty())
                @foreach ($account_locker as $locker)
                <li class="block-item">
                <div class="item">
                  <div class="img-item">
                    <div class="block-edit">
                      <i class="fas fa-chevron-down button-edit-product"></i>
                      <ul class="edit-item-product">
                        <li><a href="#"><i class="fas fa-pen"> </i>  Редактировать</a></li>
                        <li><a href="{{ url('/account/' . $locker->user_id . '/locker/delete_item/'.$locker->id) }}"><i class="fas fa-times"> </i>  Удалить</a></li>
                      </ul>
                    </div>

                    <img src="{{ asset('images/3.jpg') }}" alt="">
                  </div>
                  <h4 class="name-item"><a href="#">{{ $locker->description }}</a></h4>
                  <span class="brand">бренд</span> <span class="size">/ размер</span>
                  <span class="data-product"><span>18.05.19 </span><span>Дата публикации</span></span>
                  <div class="block-price-item">
                    <a href="#" class="menu-item"><i class="icon icon-output"></i></a>
                    <div class="">
                      <span class="new-price"> {{ $locker->price }}$ </span>
                      <span class="old-price"> 200.00$ </span>
                    </div>
                  </div>
                </div>
                </li>

                <!-- <li class="item">
                  <div class="img-item"><img src="{{ asset('images/3.jpg') }}" alt=""></div>
                  <h4 class="text-item"><a href="#">{{ $locker->description }}</a></h4>
                  <h5 class="item-price bold-700">{{ $locker->price }}$</h5>
                <li> -->

                @endforeach
            @else
              <h4 class="text-item">NO ITEMS IN LOCKER</h4>
            @endif
      <li class="block-item">
        <div class="item-add">
          <a href="{{ url('account/' . $id . '/locker/add_item_post') }}">
            <span class="add-new-product"><i class="fas fa-plus"></i></span>
            <span>Создать новый элемент</span>
          </a>
        </div>
      </li>
    </ul>
  </div>
</div>


@endsection