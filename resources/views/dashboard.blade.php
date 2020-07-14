@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid ">
            <h1>Blogger</h1>
            <div class="row">


                <div class="col-md-8">
                    <div class="row">
                        @foreach($image as $img)


                            <div class="col-md-4">
                                <div class="card card-plain card-blog">
                                    <div class="card-header card-header-image">
                                        <a href="#pablo">
                                            <img class="img img-raised" src="{{ asset('img/post/'.$img->name) }}">
                                        </a>
                                        <div class="colored-shadow"
                                             style="background-image: url({{ asset('img/post/'.$img->name) }}); opacity: 1;"></div>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-info float-left">{{ $img->post->category->name }}</h6>
                                        <h6 class="card-category text-info float-right">{{ $img->post->created_at->diffForHumans() }}</h6>
                                        <div class="clearfix"></div>
                                        <h4 class="card-title">
                                            <a href="#pablo">{{ $img->post->title }}</a>
                                        </h4>
                                        <p class="card-description">
                                            {{ $img->post->content }}
                                            <a href="#pablo"> Read More </a>
                                        </p>
                                    </div>
                                    <div class="card-footer ">
                                        <h6 class="float-left card-category">&nbsp;</h6>
                                        <h5 class="text-dark float-right  mr-0 pr-0">
                                            {{ $img->post->user->name }}
                                        </h5>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 ">

                    <h3><small> Vertical tabs</small></h3>
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="nav nav-pills nav-pills-rose flex-column">
                                <li class="nav-item"><a class="nav-link" href="#tab1" data-toggle="tab">Categorias</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Tags</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active show" href="#tab3" data-toggle="tab">Mis Post</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane " id="tab1">
                                    @foreach($category as $cat)
                                        @if($cat->id <= 4 )
                                            <ul class="pl-0 ml-0">
                                                <li class="list-group-item pl-0 ml-0">
                                                    <h6 class="text-dark float-left pl-0 ml-0">
                                                        {{ $cat->name }}
                                                    </h6>
                                                    <label
                                                        class="badge badge-info float-right  mr-0"> {{ $cat->posts->count() }} </label>
                                                </li>
                                            </ul>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="tab2">
                                    @foreach($tags as $tag)
                                        @if($tag->id <= 15)
                                            <span class="badge badge-dark">
                                                {{ $tag->name }}
                                            </span>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="tab-pane active show" id="tab3">
                                    @foreach($posts as $post)
                                        @if($post->id <= 5 )
                                            @if(auth()->user()->id == $post->user_id)
                                                <ul class="pl-0 ml-0">
                                                    <li class="list-group-item pl-0 ml-0">
                                                        <h6 class="text-dark float-left pl-0 ml-0">
                                                            {{ $post->title }}
                                                        </h6>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center">
                {!! $image->render() !!}
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
