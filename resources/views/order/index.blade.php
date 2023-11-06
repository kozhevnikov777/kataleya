@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Заказы</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Все заказы</li>
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
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID пользователя</th>
                                        <th>Заказ</th>
                                        <th>Дата заказа</th>
                                        <th>Статус заказа</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($orders as $order)
                                    <tr>
                                        <td><a href="{{ route('user.show', $order->user_id) }}">{{ $order->user_id }}</a></td>
                                        {{-- <td>{{ $order->products }}</td> --}}

                                        <td>
                                            @foreach (json_decode($order->products) as $index => $product)
                                              @php
                                                $total_price = $product->price * $product->qty;
                                              @endphp

                                              @foreach ($product as $key => $value)
                                                @if ($key !== 'image_url')
                                                  @php
                                                    $label = '';

                                                    if ($key === 'id') {
                                                      $label = 'ID товара';
                                                    } elseif ($key === 'qty') {
                                                      $label = 'количество';
                                                    } elseif ($key === 'price') {
                                                      $label = 'стоимость';
                                                    } elseif ($key === 'title') {
                                                      $label = 'название';
                                                    }
                                                  @endphp

                                                  @if ($key === 'id')
                                                    ({{ $index + 1 }})
                                                  @endif
                                                  {{ $label }}: {{ $value }}<br>
                                                @endif
                                              @endforeach
                                              <a href="{{ route('product.show', $product->id) }}">Просмотреть товар</a><br>
                                              Сумма: {{ $total_price }}<br><br>

                                            @endforeach
                                        </td>

                                        <td>{{ $order->created_at}}</td>
                                        {{-- в patronymic временно записываем статус заказа --}}
                                        <td>{{ $order->user->patronymic}}</td>
                                    </tr>
                                @endforeach

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
