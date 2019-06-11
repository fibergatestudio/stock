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
                        <button class="btn btn-warning">Удалить</button>
                        <button class="btn btn-warning">Изменить Роль</button>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>  
    </div>
</div>
@endsection