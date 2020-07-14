@extends('layouts.app', ['activePage' => 'create-post', 'titlePage' => __('Registrar publicacion')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data"
                          autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">person</i>
                                </div>
                                <h4 class="card-title">{{ __('Registrar Post') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('posts.index') }}" class="btn btn-sm btn-rose">Regresar</a>
                                    </div>
                                </div>
                                <!--    Foto    -->
                                <div class="row ">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-7 row justify-content-center align-items-center">
                                        @foreach($image as $img)
                                            @if($post->id == $img->post->id)

                                                <div class="fileinput fileinput-new text-center"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail img-circle" style="width: 100%; height:100px; overflow: hidden;" >
                                                        <img
                                                            src="{{ asset('img/post/'.$img->name) }}"
                                                            alt="...">
                                                    </div>
                                                    <div
                                                        class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                    <div>
                                                <span class="btn btn-rose btn-file">
                                                    <span class="fileinput-new">Seleccionar Imagen</span>
                                                    <span class="fileinput-exists">Cambiar</span>
{{--                                                    aqui esta el nombre para tomar los datos--}}
                                                    <input type="file" name="name" id="input-picture" value="{{ $img->name }}">
                                                </span>
                                                        <a href="#pablo" class="btn btn-danger fileinput-exists"
                                                           data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                            Borrar</a>
                                                    </div>
                                                </div>

                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <!--    Foto    -->

                                <!--     Titulo y category    -->
                                <div class="row">
                                    <!--    Titulo    -->
                                    <label class="col-sm-2 col-form-label"> </label>
                                    <div class="col-md-4 ">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('title') ? ' has-danger' : '' }} ">
                                            <label for="input-title"
                                                   class="bmd-label-floating">{{ __('Titulo') }}</label>
                                            <input type="text" name="title" id="input-title"
                                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   value="{{ $post->title }}"
                                                   required aria-required>
                                            @if ($errors->has('title'))
                                                <span id="title-error" class="error text-danger"
                                                      id="input-title"
                                                      for="input-title">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!--    Titulo    -->

                                    <!--    Category    -->
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div
                                        class="form-group  bmd-form-group{{ $errors->has('category_id') ? ' has-danger' : '' }} dropdown bootstrap-select">
                                        <label for="input-category_id"
                                               class="bmd-label-floating">{{ __('') }}</label>
                                        {!! Form::select('category_id',$category,$post->category->id,['class'=>"selectpicker show-tick ", $errors->has('category_id') ? ' is-invalid' : '' ,
                                        'title'=>'Seleccione una category', 'required'=>'true', 'data-size'=>"5", 'aria-required'=>'true','data-style'=>'select-with-transition']  ,['id'=>'input-category_id']) !!}
                                        @if ($errors->has('category_id'))
                                            <span id="category_id-error" class="error text-danger"
                                                  id="input-cateogry_id"
                                                  for="input-category_id">{{ $errors->first('category_id') }}</span>
                                        @endif
                                    </div>
                                    <!--    Category    -->

                                </div>
                                <!--     Titulo y category    -->

                                <!--    Contenido   -->
                                <div class="row ">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-7">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('contenido') ? ' has-danger' : '' }} ">
                                            <label for="input-content"
                                                   class="bmd-label-floating">{{ __('Contenido') }}</label>
                                            <textarea cols="6" rows="2" name="content" id="input-content"
                                                      class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                                      value="{{ $post->content }}"
                                                      required="true"> {{ $post->content }} </textarea>
                                            @if ($errors->has('content'))
                                                <span id="total-error" class="error text-danger"
                                                      id="input-content"
                                                      for="input-content">{{ $errors->first('content') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!--    Contenido   -->
                                </div>

                                <!--    Tag Y Status    -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-7">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('tags') ? ' has-danger' : '' }} dropdown bootstrap-select">
                                            <label for="input-tags"
                                                   class="bmd-label-floating">{{ __('') }}</label>
                                            {!! Form::select('tags[]',$tag,$myTag,['class'=>"selectpicker show-tick  ", 'multiple' ,$errors->has('tags') ? ' is-invalid' : '' ,
                                            'title'=>'Seleccionar tags', 'required'=>'true', 'data-size'=>"6", 'aria-required'=>'true','data-style'=>'select-with-transition']  ,['id'=>'input-tags']) !!}
                                            @if ($errors->has('tags'))
                                                <span id="tags-error" class="error text-danger"
                                                      id="input-tags"
                                                      for="input-tags">{{ $errors->first('tags') }}</span>
                                            @endif
                                        </div>
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                    <!--    Conductor    -->

                                        <!--     Estatus     -->
                                        {{--                                <div class="row">--}}
                                        <label class="col-sm-3 col-form-label padding-horiz">&nbsp;</label>
                                        {{--                                    <div class="col-sm-7">--}}
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('status') ? ' has-danger' : '' }} dropdown bootstrap-select ">
                                            <label for="input-status"
                                                   class="bmd-label-floating">{{ __('') }}</label>

                                            {!! Form::select('status',['publicado'=>'publicado','inactivo'=>'inactivo','borrador'=>'borrador'],$post->status,['class'=>"selectpicker show-tick ", $errors->has('status') ? ' is-invalid' : '' ,
                                            'title'=>'estatus de la publicacion', 'required'=>'true', 'data-size'=>"5", 'aria-required'=>'true','data-style'=>'select-with-transition']  ) !!}
                                            @if ($errors->has('status'))
                                                <span id="status-error" class="error text-danger"
                                                      id="input-status"
                                                      for="input-status">{{ $errors->first('status') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--    Tag Y Status    -->


                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-rose">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


