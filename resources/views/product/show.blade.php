@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукт</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Продукт</li>
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
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Редактировать</a>
                            </div>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $product->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Наименование</td>
                                            <td>{{ $product->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>Описание</td>
                                            <td>{{ $product->description }}</td>
                                        </tr>
                                        <tr>
                                            <td>Контент</td>
                                            <td>{{ $product->content }}</td>
                                        </tr>
                                        <tr>
                                            <td>Цена</td>
                                            <td>{{ $product->price }}</td>
                                        </tr>
                                        <tr>
                                            <td>Количество на складе</td>
                                            <td>{{ $product->count }}</td>
                                        </tr>
                                        <tr>
                                            <td>Изображение</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $product->preview_image) , $product->id}}" alt="product" class="col-md-6 blog-post">
                                                {{-- {{ $product->preview_image }} --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Категория</td>
                                            <td>{{ $product->category->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>Группа</td>
                                            <td>{{ $product->group_id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Тег</td>
                                            <td>{{ $product->tag_id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Цвет</td>
                                            <td>{{ $product->color_id }} </td>
                                        </tr>
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
