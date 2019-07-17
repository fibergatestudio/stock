@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="list-top-menu">
      <li class="active"><a href="{{ url('/account/' . $id . '/locker') }}">Мой шкаф</a></li>
      <li><a href="{{ url('/account/' . $id . '/locker/active_links') }}">Активные ссылки</a></li>
      <li><a href="{{ url('/account/' . $id . '/locker/drafts') }}">Черновики</a></li>
      <li><a href="{{ url('/account/' . $id . '/locker/deleted') }}">Удалены</a></li>
      <li><a href="{{ url('/account/' . $id . '/locker/sold_out') }}">Продано</a></li>
    </ul>
  </div>
<div style="background-image: url({{ Storage::url($user_settings->locker_background) }});" class="menu-bottom">
  <div class="container">

      <!-- <div class="info-user">
        <div class="block-photo-user"><img src="assets/images/2.png" alt=""><a href="#"><i class="fas fa-camera"></i></a></div>
        <div class="block-name-user">
          <h3 class="name-user bold-700">{{ Auth::user()->name }} <a href="#"><i data-toggle="modal" data-target="#editNicknameModal" class="fas fa-pencil-alt"></i></a></h3>
          <h6>reference site about Lorem ipsum</h6>
          <span>{{ $user_settings->additional_info }}</span>
        </div>
      </div> -->

    <!-- <div class="edit">
      <a href="#"><i data-toggle="modal" data-target="#editBackgroundModal" class="fas fa-pencil-alt"></i></a>
    </div> -->
    <div class="info-user">
    <a href="#" data-toggle="modal" data-target="#editProfilePictureModal"><div class="block-photo-user"><img style="border-radius: 50%; position: absolute;"src="{{ Storage::url($user_settings->profile_picture) }}" alt=""><i class="fas fa-camera"></i></div></a>
      <div class="block-name-user">
        <h3 class="name-user bold-700">{{ Auth::user()->name }} <a href="#"><i data-toggle="modal" data-target="#editNicknameModal" class="fas fa-pencil-alt"></i></a></h3><br>
        <h4>Reference site about Lorem ipsum</h4><br>
        <span>{{ $user_settings->additional_info }}</span>
      </div>
    </div>
    <!-- <div class="info-tab">
      <ul>
        <!-- Вывод кол-ва вещей -->
        <!-- <li><span class="quantity-items bold-700">{{ $items }}</span><h4>Вещей</h4></li> -->
        <!-- <li><span class="quantity-followers bold-700">200</span><h4>Followers</h4></li>
        <li><span class="quantity-following bold-700">462</span><h4>Following</h4></li> -->
      </ul>
    </div> 
  </div>
</div>
<div class="main cupboard">
  <div class="container">
    <!-- <h2 class="title-items bold-700">Мой шкаф</h2> -->
    <ul class="list-item">

            <!-- Проверка, есть ли продажи?  -->
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
    </ul>
  </div>
</div>

<!-- MODALS -->

{{-- Изменение Никнейма --}}
    <form action="{{ url('/account/' . $id . '/locker/change_nickname') }}" method="POST">
        @csrf

        <div class="modal fade" id="editNicknameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Изменить Никнейм</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            <input type="hidden" name="user_id" value="{{ $id }}">

                            <div class="form-group">
                                <label>Текущий Никнейм</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled > 
                            </div>

                            <div class="form-group">
                                <label>Новый Никнейм</label>
                                <input type="text" name="new_username" class="form-control" required > 
                            </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-success">Изменить</button>
                    </div>
                </div>{{-- /modal-content --}}
            </div>{{-- /modal-dialog --}}
        </div>{{-- /modal fade --}}
    </form>
{{-- Изменение бэкграунда --}}
    <form action="{{ url('/account/' . $id . '/locker/change_background') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal fade" id="editBackgroundModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Изменить Бэкграунд</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            <input type="hidden" name="user_id" value="{{ $id }}">

                            <div class="form-group">
                                <label>Выберите Бэкграунд</label>
                                <input type="file" name="locker_background" class="form-control" required > 
                            </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-success">Изменить</button>
                    </div>
                </div>{{-- /modal-content --}}
            </div>{{-- /modal-dialog --}}
        </div>{{-- /modal fade --}}
    </form>
{{-- Изменение бэкграунда --}}
  <form action="{{ url('/account/' . $id . '/locker/change_profile_picture') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="modal fade" id="editProfilePictureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Изменить Аватар</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">

                          <input type="hidden" name="user_id" value="{{ $id }}">

                          <div class="form-group">
                              <label>Выберите Аватар</label>
                              <input type="file" name="profile_picture" class="form-control" required > 
                          </div>

                      
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                      <button type="submit" class="btn btn-success">Изменить</button>
                  </div>
              </div>{{-- /modal-content --}}
          </div>{{-- /modal-dialog --}}
      </div>{{-- /modal fade --}}
  </form>


@endsection