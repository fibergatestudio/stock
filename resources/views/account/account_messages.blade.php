@extends('layouts.app')

@section('content')
<div class="main massage">
    <div class="container">
        <div class="top-block">
            <h2 class="title-items bold-700">Сообщения</h2>
            <form class="form-inline form-search">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> <a href="#"><i class="fas fa-search"></i></a>
            </form>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills1" role="tab" aria-controls="v-pills-home" aria-selected="true">Полученные</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills2" role="tab" aria-controls="v-pills-profile" aria-selected="false">Отправленные</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills3" role="tab" aria-controls="v-pills-messages" aria-selected="false">Архивные</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills1" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <table class="table-message">
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck10">
                                        <label class="form-check-label" for="defaultCheck10">В архив</label>
                                    </div>
                                </td>
                                <td class="col-md-3">Пользователь</td><td class="col-md-5">Сообщение</td><td class="col-md-2">Дата</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                        <label class="form-check-label" for="defaultCheck2"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                        <label class="form-check-label" for="defaultCheck3"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                        <label class="form-check-label" for="defaultCheck4"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck">
                                        <label class="form-check-label" for="defaultCheck"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="v-pills2" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <table class="table-message">
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                                        <label class="form-check-label" for="defaultCheck5">В архив</label>
                                    </div>
                                </td>
                                <td class="col-md-3">Пользователь</td><td class="col-md-5">Сообщение</td><td class="col-md-2">Дата</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck6">
                                        <label class="form-check-label" for="defaultCheck6"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck7">
                                        <label class="form-check-label" for="defaultCheck7"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck8">
                                        <label class="form-check-label" for="defaultCheck8"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck9">
                                        <label class="form-check-label" for="defaultCheck9"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="v-pills3" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <table class="table-message">
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultChecka">
                                        <label class="form-check-label" for="defaultChecka">В архив</label>
                                    </div>
                                </td>
                                <td class="col-md-3">Пользователь</td><td class="col-md-5">Сообщение</td><td class="col-md-2">Дата</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultChecks">
                                        <label class="form-check-label" for="defaultChecks"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheckd">
                                        <label class="form-check-label" for="defaultCheckd"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheckf">
                                        <label class="form-check-label" for="defaultCheckf"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheckg">
                                        <label class="form-check-label" for="defaultCheckg"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">Я, Имя продавца</a></td><td class="col-md-5"><a href="#">Название объявления Текст сообщения</a></td><td class="col-md-2">5 мая, 18:46</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection