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
                            @if ($account_sent_messages->isNotEmpty())
                                @foreach ($account_sent_messages as $sent_message)
                                <tr class="row">
                                    <td class="col-md-2">
                                            <form action="{{ url('/account/' . $id . '/messages/' . $sent_message->id . '/archive') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="message_id" value="{{ $sent_message->id }}">

                                                    <div>   
                                                        <button type="submit" class="btn icon-delete icon"></button>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                        
                                        </div> -->
                                    </td>
                                    <td class="col-md-3"><a href="#" class="icon-refer">{{ $sent_message->user_id }}, {{ $sent_message->from_user_id }}</a></td><td class="col-md-5"><a href="#">Название объявления {{ $sent_message->message }}</a></td><td class="col-md-2">{{ $sent_message->date }}</td>
                                </tr>
                                @endforeach
                            @else
                            NOMESSAGES
                            @endif
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
                            @if ($account_received_messages->isNotEmpty())
                                @foreach ($account_received_messages as $received_message)
                                <tr class="row">
                                    <td class="col-md-2">
                                        <form action="{{ url('/account/' . $id . '/messages/' . $received_message->id . '/archive') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="message_id" value="{{ $received_message->id }}">

                                                    <div>   
                                                        <button type="submit" class="btn icon-delete icon"></button>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                    </td>
                                    <td class="col-md-3"><a href="#" class="icon-refer">{{ $received_message->user_id }}, {{ $received_message->from_user_id }}</a></td><td class="col-md-5"><a href="#">Название объявления {{ $received_message->message }}</a></td><td class="col-md-2">{{ $received_message->date }}</td>
                                </tr>
                                @endforeach
                            @else
                            NOMESSAGES
                            @endif
                            <!-- <tr class="row">
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
                            </tr>-->
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

                            @foreach ($account_archived_messages as $archived_message)
                            <tr class="row">
                                <td class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                        <label class="form-check-label" for="defaultCheck2"><a href="#" class="icon-delete icon"></a></label>
                                    </div>
                                </td>
                                <td class="col-md-3"><a href="#" class="icon-refer">{{ $archived_message->user_id }}, {{ $archived_message->from_user_id }}</a></td><td class="col-md-5"><a href="#">Название объявления {{ $archived_message->message }}</a></td><td class="col-md-2">{{ $archived_message->date }}</td>
                            </tr>
                            @endforeach
                            <!-- <tr class="row">
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
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection