@extends('layouts.app')

@section('content')
<div class="main bag">
    <div class="container">
        <h2 class="title-items bold-700">Мои кошелек</h2>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Управление выплатами</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Информация для выставления счетов</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Настройка выплат</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">11111</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <ul class="payment">
                            <li>
                                <div class="block">
                                    <h3>В ожидании доходов</h3>
                                    <h4>{{ $account_wallet->waiting_money }} $</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <h3>Имеется в наличии</h3>
                                    <h4>{{ $account_wallet->available_money }} $</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                        Aenean commodo ligula eget dolor. Aenean massa.
                                        Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <h3>Вывод средств</h3>
                                    <button>вывод</button>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <form action="{{ url('/account/' . $id . '/wallet/apply_changes') }}" method="POST" class="row" enctype="multipart/form-data" class="col">
                                @csrf
                            <input type="hidden" name="user_id" value="{{ $id }}">
                            <div class="form-group col-md-6">
                                <label for="name">ФИО</label>
                                <input class="form-control" id="name" name="card_name" value="{{ $account_wallet->card_name }}">
                                <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example">Адрес</label>
                                <input  class="form-control" id="example" name="card_address" value="{{ $account_wallet->card_address }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Номер карты</label>
                                <input type="text" class="form-control" id="card" name="card_number" value="{{ $account_wallet->card_number }}">
                                <small id="emailHelp3" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                <small id="emailHelp5" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Город</label>
                                <input class="form-control" id="city" name="card_city" value="{{ $account_wallet->card_city }}">
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
                                <label for="country">Страна</label>
                                <select class="form-control" id="country" name="card_country">
                                    <option>TEST</option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit">Сохранить</button>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="1">Штат</label>
                                <select class="form-control" id="1" name="card_state">
                                    <option>TEST</option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"><button>Добавить метод выплат</button></div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection