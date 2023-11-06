@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Пользователи</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- TABLE -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('user.create') }}" class="btn btn-primary">Добавить</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Имя</th>
                                        <th>Номер тел.</th>
                                        <th>Статус заказа</th>
                                        <th>Email</th>
                                        <th>Возраст</th>
                                        {{-- <th>Пол</th> --}}
                                        <th>Адрес</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->id }}</a></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->surname }}</td>
                                        <td>{{ $user->patronymic }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->age }}</td>
                                        {{-- Models/User.php объяснение--}}
                                        {{-- <td>{{ $user->genderTitle }}</td> --}}
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                @endforeach

                                {{-- тест на вывод заказов
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->user_id }}</td>
                                        <td>{{ $order->products}}</td>
                                    </tr>
                                @endforeach --}}


                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.TABLE -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
