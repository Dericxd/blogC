@extends('layouts.app', ['activePage' => 'post-management', 'titlePage' => __('Gestion Post')])

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
                            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-rose">Registrar</a>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table " id="datatables">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th></th>
                                        <th>Titulo</th>
                                        <th class="text-center">Categoria</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        @if(auth()->user()->id == $post->user_id)
                                            <tr>
                                                <td class="text-center">{{ $post->id }}</td>
                                                <td class="text-center">
                                                    @foreach($image as $img )

                                                        @if($post->id == $img->post->id)
                                                            <div
                                                                class="avatar avatar-sm rounded-circle img-circle embed-responsive-21by9"
                                                                style="width:50px; height:50px;overflow: hidden;">
                                                                {{--                                                            {{ dd($img->name) }}--}}
                                                                {{--                                                            <img src="/img/post/{{$img->name }}" alt=""--}}
                                                                <img src="{{ asset('img/post/'.$img->name) }}" alt=""
                                                                     style="width: 100%;height: 55px; "
                                                                     class="embed-responsive-21by9 ">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $post->title }}</td>
                                                <td class="text-center"> {{ $post->category->name }} </td>
                                                <td class="text-center"> {{ $post->status }} </td>
                                                <td class="td-actions text-center">
                                                    <form action="{{ route('posts.destroy', $post) }}" method="post">

                                                        <a rel="tooltip" class="btn btn-info btn-round"
                                                           href="{{ route('posts.show', $post->id) }}"
                                                           data-original-title="" title="">
                                                            <i class="material-icons">person</i>
                                                        </a>
                                                        <a rel="tooltip" class="btn btn-success btn-round"
                                                           href="{{ route('posts.edit',$post->id) }}">
                                                            <i class="material-icons">edit</i>
                                                        </a>

                                                        {{--eliminar--}}
                                                        @csrf
                                                        @method('delete')

                                                        <button type="button" rel="tooltip"
                                                                class="btn btn-danger btn-round"
                                                                data-original-title="" title=""
                                                                onclick="confirm('{{ __("Esta seguro que desea eliminar este transporte?") }}') ? this.parentElement.submit() : ''">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </form>


                                                    {{--eliminar--}}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                {{--                            <div class="text-center">--}}
                                {{--                                {!! $posts->render() !!}--}}
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
