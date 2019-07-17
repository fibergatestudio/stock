@extends('layouts.app')

@section('content')
<!-- <div class="main friends">
    <div class="container">
        <h2 class="title-items bold-700"></h2>
        <div class="block-text-friends row">
            <div class="col-md-6">
                <p>Получи за каждого приглашенного друга сделавшего покупку на 200 шекелей - 40 шекелей на свой счет.<br/><br/>
                    <span>При этом они получат скидку 20 долларов на первую покупку</span>
                </p>
                <div>
                    <span>Поделитесь своей ссылкой</span>
                    <form class="form-inline">

                        <div class="form-group mx-sm-3 mb-2">
                            <label for="" class="sr-only"></label>
                            <input id="ref-id" class="form-control" value="{{ url('?ref-id='.$id) }}" >
                        </div>
                        <button onclick="copyFunction(this)" type="button" class="btn btn-primary mb-2">Копировать</button>
                    </form>
                    <p>При регистрации у приглашенного будет дополнительный, заполненный пункт "ID пригласившего"</p>
                </div>

            </div>
            <div class="col-md-6">
                <h4>Пригласить по электронной почте</h4>
                <div class="">

                </div>

            </div>
        </div>
    </div>
</div> -->

<div class="main friends">
    <div class="container">
        <div class="block-text-friends row py-4">
            <div class="col-md-6 px-5 my-3">
                <h4>Получи за каждого приглашенного друга сделавшего покупку на 200 шекелей – 40 шекелей на свой счет.</h4>
                <h5>При этом они получат скидку 20долларов скидку на первую покупку</h5>
            </div>
            <div class="col-md-6 px-5 my-3">
                <h4>Пригласить по электронной почте</h4>
                <form class="form-invite p-4">
                    <div class="form-group row">
                        <label class="col-sm col-form-label" for="inviteEmail1">От:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control-plaintext" id="inviteEmail1" aria-describedby="emailHelp" placeholder="Ваше имя">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Добавить друзей из:</label>
                        <div class="col-sm">
                            <a href="" class="btn-secondary btn"></a>
                        </div>
                        <div class="col-sm">
                            <a href="" class="btn-secondary btn"></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subjectInput">Отправить</label>
                        <textarea class="form-control" id="subjectInput"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="messageInput">Сообщение</label>
                        <textarea class="form-control" id="messageInput"></textarea>
                    </div>

                    <button type="submit" class="btn btn-secondary btn-block">Выслать приглашение</button>
                </form>

            </div>
            <div class="col-md-6 px-5 my-3">
                <span class="title">Поделитесь своей ссылкой</span>
                <form class="form-inline">
                    <div class="form-group flex-grow-1">
                        <label for="" class="sr-only"></label>
                        <input id="ref-id" class="form-control" value="{{ url('?ref-id='.$id) }}" >
                    </div>
                    <button onclick="copyFunction(this)" type="button" class="btn btn-secondary">Копировать</button>
                </form>
                <!-- <form class="form-inline">
                    <div class="form-group flex-grow-1">
                        <label for="staticEmail2" class="sr-only">Email</label>
                        <input type="text" readonly class="form-control" id="staticEmail2" value="email@example.com">
                    </div>
                    <button type="submit" class="btn btn-secondary">Копировать</button>
                </form> -->
            </div>
            <div class="col-md-6 px-5 my-3 d-flex flex-row  flex-wrap" >
                <span class="title">Поделитесь своей ссылкой</span>
                

                <div class="share-item">
                    <a href="#" class="btn btn-secondary">&nbsp;</a>
                </div>
                <div class="share-item">
                    <a href="#" class="btn btn-secondary">&nbsp;</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection