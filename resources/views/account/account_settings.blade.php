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
                    <a class="nav-link" id="v-pills-book-tab" data-toggle="pill" href="#v-pills-book" role="tab" aria-controls="v-pills-book" aria-selected="false">Адресная книга</a>
                    <a class="nav-link" id="v-pills-account-tab" data-toggle="pill" href="#v-pills-account" role="tab" aria-controls="v-pills-card" aria-selected="false">Информация для выставления счетов</a>
                    <a class="nav-link" id="v-pills-account-tab-2" data-toggle="pill" href="#v-pills-account-2" role="tab" aria-controls="v-pills-messages" aria-selected="false">Управление выплатами</a>
                    <a class="nav-link" id="v-pills-account-tab-3" data-toggle="pill" href="#v-pills-account-3" role="tab" aria-controls="v-pills-messages" aria-selected="false">Настройка выплат</a>
                    <a class="nav-link" id="v-pills-present-tab" data-toggle="pill" href="#v-pills-present" role="tab" aria-controls="v-pills-present" aria-selected="false">Подарочные карты и купоны</a>
                    <a class="nav-link"  href="{{ url('account/' . $id .'/invites') }}" >Пригласить друзей <i class="fas fa-chevron-right"></i></a>
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
                            
                            <form id="form-change-password" role="form" method="POST" action="{{ url('/account/settings/change_password') }}" novalidate class="col form-horizontal">
                                <div class="form-group">
                                    <h2  class="form-title">Изменить пароль</h2>
                                </div>
                                @if ($message !== '')
                                <p style="color: green;">{{ $message }}</p>
                                @endif
                                <?php 
                                /*if (!empty($pass_errors)) {
                                    echo '<pre>'. print_r($pass_errors,true).'</pre>';
                                    //die();
                                } */ 
                                ?>
                                <div class="form-group">
                                    <label for="current-password">Текущий пароль</label>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                    <input type="password" class="form-control {{ (isset($pass_errors['current-password'][0]) OR isset($pass_error['current-password']))?'is-invalid':'' }}" id="current-password" name="current-password">
                                    @if (isset($pass_errors['current-password'][0]))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $pass_errors['current-password'][0] }}</strong>
                                    </span>
                                    @elseif (isset($pass_error['current-password']))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $pass_error['current-password'] }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Новый пароль</label>
                                    <input type="password" class="form-control {{ (isset($pass_errors['password'][0]))?'is-invalid':'' }}" id="password" name="password">
                                    @if (isset($pass_errors['password'][0]))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $pass_errors['password'][0] }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Повторить пароль</label>
                                    <input type="password" class="form-control {{ (isset($pass_errors['password_confirmation'][0]))?'is-invalid':'' }}" id="password_confirmation" name="password_confirmation">
                                    @if (isset($pass_errors['password_confirmation'][0]))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $pass_errors['password_confirmation'][0] }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-secondary">Обновить</button>
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
                                        <input type="text" class="form-control" id="username" name="username" placeholder="@" name="" value="{{ $user->name }}">
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
                    <div class="tab-pane fade" id="v-pills-book" role="tabpanel" aria-labelledby="v-pills-book-tab">
                        <div class="block-book">
                            <p>Ваш адрес продажи</p>
                            <p>Здесь, мы отправляем ваш комплект для доставки, когда вы продаете товар.</p>
                            <p class="add-address"><span>Добавить адрес доставки</span> <a href="#" class="fas fa-plus"></a></p>
                        </div>
                        <h6>Все адреса</h6>
                        <div class="block-book-2">
                            <p class="add-address"><span>Добавить адрес</span> <a href="#" class="fas fa-plus"></a></p>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">
                        <form action="{{ url('/account/' . $id . '/wallet/apply_changes') }}" method="POST" class="row" enctype="multipart/form-data" class="col">
                                @csrf
                            <input type="hidden" name="user_id" value="{{ $id }}">
                            <div class="form-group col-md-6">
                                <h2  class="form-title">Информация о кредитной карте</h2>
                                <label for="name">ФИО</label>
                                <input class="form-control" id="name" name="card_name" value="{{ $account_wallet->card_name }}">
                                <small id="emailHelp1" class="form-text text-muted">Ваше имя как указано на кредитной карте</small>
                            </div>
                            <div class="form-group col-md-6">
                                <h2  class="form-title">Платежная информация</h2>
                                <label for="example">Адрес</label>
                                <input  class="form-control" id="example" name="card_address" value="{{ $account_wallet->card_address }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Номер карты</label>
                                <input type="text" class="form-control" id="card" name="card_number" value="{{ $account_wallet->card_number }}">
                                <small id="emailHelp3" class="form-text text-muted">Мы принимаем карты VISA, American Express и Discover. Мы никогда не сохраняем информацию о вашей кредитной карте.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Город</label>
                                <input class="form-control" id="city" name="card_city" value="{{ $account_wallet->card_city }}">
                                <label for="country">Поштовый индекс</label>
                                <select class="form-control" id="country">
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="data">Срок действия</label>
                                <input type="month" class="form-control" id="data" placeholder="ММ/ГГ" name="card_date" value="{{ $account_wallet->card_date }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cvv">CVV</label>
                                <input class="form-control" id="cvv" placeholder="***" name="card_cvv" value="{{ $account_wallet->card_cvv }}">

                            </div>
                            <div class="form-group col-md-6">
                                <label for="1">Страна</label>
                                <select class="form-control" id="country" name="card_country">
                                    <option>TEST</option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="color-btn btn btn-secondary">Сохранить</button>
                            </div>

                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-account-2" role="tabpanel" aria-labelledby="v-pills-account-2-tab">
                        <ul class="payment">
                            <li>
                                <div class="block">
                                    <h3><span>Кредит сайта</span></h3>
                                    <h4>{{ $account_wallet->credit_money }} $</h4>
                                    <p>Кредит сайта может быть использован для покупок на сайте</p>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <h3><span>Имеется в наличии</span></h3>
                                    <h4>{{ $account_wallet->available_money }} $</h4>
                                    <p>Может быть использован немедленно для совершения покупки на сайте или вывода средств.</p>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <h3><span>В ожидании доходов</span></h3>
                                    <h4>{{ $account_wallet->waiting_money }}  $</h4>
                                    <p>Смотрите историю ниже для получения подробной информации о наличии средств.</p>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <h3><span>Вывод средств</span></h3>
                                    <button class="btn btn-secondary color-btn">вывод</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-account-3" role="tabpanel" aria-labelledby="v-pills-account-3-tab">
                        <button class="btn btn-secondary color-btn btn-add-pay">Добавить метод выплат</button>
                    </div>
                    <div class="tab-pane fade" id="v-pills-present" role="tabpanel" aria-labelledby="v-pills-present-tab">
                        <div class="present row">
                            <form class="col-md-6">
                                <div class="form-group">
                                    <p>Готовы на свободные деньги?</p>
                                    <small class="form-text text-muted">Введите код</small>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <button class="color-btn btn-secondary btn">Выкупить</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Новые настройки -->

@endsection