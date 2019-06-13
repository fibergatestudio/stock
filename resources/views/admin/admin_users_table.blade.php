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
    </div>
</div>

@endsection