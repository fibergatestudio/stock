@extends('layouts.app')

@section('content')
<div class="main friends">
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
@endsection