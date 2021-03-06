@extends('layouts.app')

@section('content')
<div style="background-image: url({{ Storage::url($user_settings->locker_background) }});" class="menu-bottom">
  <div class="container">
    <div class="edit">
      <a href="#"><i data-toggle="modal" data-target="#editBackgroundModal" class="fas fa-pencil-alt"></i></a>
    </div>
    <div class="info-user">
    <a href="#" data-toggle="modal" data-target="#editProfilePictureModal"><div class="block-photo-user"><img style="border-radius: 50%; position: absolute;"src="{{ Storage::url($user_settings->profile_picture) }}" alt=""><i class="fas fa-camera"></i></div></a>
      <div class="block-name-user">
        <h3 class="name-user bold-700">{{ Auth::user()->name }} <a href="#"><i data-toggle="modal" data-target="#editNicknameModal" class="fas fa-pencil-alt"></i></a></h3><br>
        <h4>Reference site about Lorem ipsum</h4><br>
        <span>{{ $user_settings->additional_info }}</span>
      </div>
    </div>
    <div class="info-tab">
      <ul>
        <!-- Вывод кол-ва вещей -->
        <li><span class="quantity-items bold-700">{{ $items }}</span><h4>Вещей</h4></li>
        <!-- <li><span class="quantity-followers bold-700">200</span><h4>Followers</h4></li>
        <li><span class="quantity-following bold-700">462</span><h4>Following</h4></li> -->
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