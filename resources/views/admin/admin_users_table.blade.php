@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="side-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Кнопки</th>{{-- Кнопки управления --}}
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    {{ $user->id }}
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    <div class="row">
                    <a href="{{ url('/account/' . $id . '/admin/users_table/' . $user->id . '/delete') }}"><button class="btn btn-warning">Удалить</button></a>
                        @if ($user->role == 'admin')
                        <a href="{{ url('/account/' . $id . '/admin/users_table/' . $user->id . '/change_role') }}"><button class="btn btn-primary">Сделать Юзером</button></a>
                        @elseif ($user->role == 'user')
                        <a href="{{ url('/account/' . $id . '/admin/users_table/' . $user->id . '/change_role') }}"><button class="btn btn-warning">Сделать Админом</button></a>
                        @endif
                    </div>
                </td>
            </tr>

            @endforeach
            </tbody>
        </table>

        <form action="{{ url('/admin/send_message') }}" method="POST" enctype="multipart/form-data" class="col">
            @csrf
            <input type="hidden" name="from_user_id" value="{{ $id }}">
            <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
            <div class="form-group">
                <h2 class="form-title">Отправка сообщений</h2>
            </div>
            @if ($sent_message !== '')
            <p style="color: green;">{{ $sent_message }}</p>
            @endif
            <div class="form-group">
                <label for="theme">Тема</label>
                <input type="text" name="theme" class="form-control" id="theme" placeholder="Тема сообщения" >
            </div>
            <div class="form-group">
                <label for="message">Текст</label>
                <textarea name="message" class="form-control" id="message" placeholder="Текст сообщения" ></textarea>
            </div>
            <button type="submit" class="btn btn-secondary">Отправить всем сообщение</button>
        </form>

    </div>
</div>


@endsection
