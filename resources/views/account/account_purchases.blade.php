@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mx-5 mt-4">
    <div class="content">
        <h1>My Purchases</h1>
            <table class="table table-striped table-hover mx-auto">
                <thead>
                    <tr>
                        <th>Purchase Date</th>
                        <th></th>{{-- Фото? --}}
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="height: 100px; background-color: wheat;" valign="middle"> 
                        <td>
                            21 june 2019
                        </td>
                        <td>
                            <div class="card-img-top" style="height: 100px; background-color: lavenderblush;"></div>
                        </td>
                        <td>
                            Information
                        </td>
                        <td>
                            187.00$
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</div>
@endsection