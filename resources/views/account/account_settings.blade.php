@extends('layouts.app')

@section('content')
<style>

.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

</style>
<div class="main settings">
    <div class="container">
        <div class="top-block">
            <h2 class="title-items bold-700">Настройки аккаунта</h2>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Настройки аккаунта</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Настройки шкафа</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Уведомления</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="d-flex">
                            <form action="{{ url('/account/' . $id . '/settings/apply_settings') }}" method="POST" enctype="multipart/form-data" class="col">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $id }}">
                                <div class="form-group">
                                    <h2 class="form-title">Контакты</h2>
                                </div>
                                <div class="form-group">
                                    <label for="full-name">ФИО</label>
                                    <input type="text" name="full_name" class="form-control" id="full-name" placeholder="Ваше имя" value="{{ $user_settings->full_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Адрес електронной почты</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="mail@gmamil.com" value="{{ $user_settings->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="newphone">Текущий номер</label>
                                    <input type="text" class="form-control" id="newphone" placeholder="No Phone Number" value="{{ $user_settings->phone_number }}" disabled>
                                </div>
                                <div class="phone d-flex justify-content-between">
                                    <div class="form-group w-25 mr-1">
                                        <label for="phone-code">Код страны</label>
                                        <select type="text" name="code" class="form-control" id="phone-code">
                                            <option value="380">+ 380</option>
                                            <option value="390">+ 390</option>
                                        </select>
                                    </div>
                                    <div class="form-group w-75">
                                        <label for="phone-number">Номер телефона</label>
                                        <input type="text" name="phone" class="form-control" id="phone-number">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-secondary">Сохранить</button>
                            </form>
                            <form action class="col">
                                <div class="form-group">
                                    <h2  class="form-title">Изменить пароль</h2>
                                </div>
                                <div class="form-group">
                                    <label for="current-pass">Текущий пароль</label>
                                    <input type="text" class="form-control" id="current-pass">
                                </div>
                                <div class="form-group">
                                    <label for="new-pass">Новый пароль</label>
                                    <input type="text" class="form-control" id="new-pass">
                                </div>
                                <div class="form-group">
                                    <label for="repeat-pass">Повторить пароль</label>
                                    <input type="text" class="form-control" id="repeat-pass">
                                </div>
                                <button class="btn btn-secondary">Обновить</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <form action="{{ url('/account/' . $id . '/settings/apply_locker_settings') }}" method="POST" enctype="multipart/form-data" class="col">
                                @csrf
                            <input type="hidden" name="user_id" value="{{ $id }}">
                            <div class="form-group">
                                <h2 class="form-title">Обложка шкафа и изображение профиля</h2>
                            </div>
                            <!-- <img src="{{ Storage::url($user_settings->locker_background) }}"/> -->
                            <div style="background-image: url({{ Storage::url($user_settings->locker_background) }});" class="jumbotron background d-flex justify-content-between">
                                <div style="position: relative; overflow: hidden; display: inline-block;" class="upload-btn-wrapper">
                                    <div style="background-image: url({{ Storage::url($user_settings->profile_picture) }});" class="avatar icon-photo d-flex justify-content-center align-items-center">
                                        <span class="h1 p-0">N</span>
                                            <input style="font-size: 100px; position: absolute; left: 0; top: 0; opacity: 0;"type="file" name="profile_picture" />
                                    </div>
                                </div>
                                <div class="">
                                    <!-- <input type="file" name="locker_background" class="form-control"></input>
                                    <a href="#" class="btn btn-secondary">Изменить изображение</a> -->
                                    <div style="position: relative; overflow: hidden; display: inline-block;" class="upload-btn-wrapper">
                                        <button class="btn btn-secondary">Изменить изображение</button>
                                        <input style="font-size: 100px; position: absolute; left: 0; top: 0; opacity: 0;"type="file" name="locker_background" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="#" class="btn btn-secondary">Импорт из Facebook</a>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="public-name">Отображаемое имя</label>
                                        <input type="text" class="form-control" id="public-name" placeholder="Ваше имя" name="displayed_name" value="{{ $user_settings->displayed_name }}">
                                        <small class="form-text text-muted">Отображаемое имя - жто то, как будет ваше отображаться в остальной части шкафа.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Имя пользователя</label>
                                        <input type="text" class="form-control" id="username" placeholder="@" name="">
                                        <small class="form-text text-muted">www.nn.com/www/123</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">Город</label>
                                        <input type="text" class="form-control" id="city" placeholder="@" name="city" value="{{ $user_settings->city }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="birthday">Дата рождения</label>
                                        <div class="d-flex justify-content-between">
                                            <input type="date" class="form-control" name="birthday" value="{{ $user_settings->birthday }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="description" rows="5" class="form-control" name="additional_info" placeholder="{{ $user_settings->additional_info }}"></textarea>
                                        <small class="form-text text-muted">Добавте короткое описание себя или своего магазина, чтобы помочь другим узнать вас. (Не более 1500 символов.)</small>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-secondary">Сохранить</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <form action="{{ url('/account/' . $id . '/settings/apply_notifications') }}" method="POST" enctype="multipart/form-data" class="col">
                                @csrf
                            <input type="hidden" name="user_id" value="{{ $id }}">
                            <div class="form-group">
                                <h2 class="form-title">Уведомления по электронной почте</h2>
                            </div>

                            <p>
                                Хотите получать меньше писем? Нет проблем, просто отметьте темы, о которых вы хотите услышать больше, или снимите галочки с тех, которые вам не нужны.
                            </p>

                            <div class="form-check form-group">
                                <input class="form-check-input" type="checkbox" name="new_income" id="inlineRadio1" value="option1"                            
                                @if($notification_exp[0] == '0')

                                @else
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="inlineRadio1">
                                    <p>Новые поступления</p>
                                    <small class="form-text text-muted">Уведомления для обязательного просмотра новых поступлений.</small>
                                </label>
                            </div>
                            <div class="form-check form-group">
                                <input class="form-check-input" type="checkbox" name="sales_discounts" id="inlineRadio2" value="option2"
                                @if($notification_exp[1] == '0')

                                @else
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="inlineRadio2">
                                    <p>Продажи и Скидки</p>
                                    <small class="form-text text-muted">Немедленный доступ к событиям продаж и специальным промо-кодам.</small>
                                </label>
                            </div>
                            <div class="form-check form-group">
                                <button class="btn btn-secondary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</d
@endsection