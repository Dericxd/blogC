@extends('layouts.app', ['activePage' => 'category-management', 'titlePage' => __('Gestion Category')])

@section('content')


    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('flash::message')
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Conductores</h4>
                        </div>
                        <div class="col-12 text-right">
                            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-rose">Registrar</a>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table " id="datatables">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">name</th>

                                        <th class="text-center">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="text-center">{{ $category->id }}</td>
                                            <td class="text-center"> {{ $category->name }} </td>
                                            <td class="td-actions text-center">


                                                    <a rel="tooltip" class="btn btn-success btn-round "
                                                       href="{{ route('categories.edit',$category->id) }}">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{--                            <div class="text-center">--}}
                                {{--                                {!! categories->render() !!}--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('js')

    <script>

        $(document).ready(function () {

            $('#datatables').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
                },
                "paging": true,
                "order": [[0, 'desc']],
                "info": true,
                // "autoFill": true,
            })

        });
    </script>

@endsection
