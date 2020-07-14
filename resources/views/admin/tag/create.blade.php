@extends('layouts.app', ['activePage' => 'create-tag', 'titlePage' => __('Registrar Tag')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('tags.store') }}"
                          autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">person</i>
                                </div>
                                <h4 class="card-title">{{ __('Registrar tags') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('tags.index') }}" class="btn btn-sm btn-rose">Regresar</a>
                                    </div>
                                </div>

                                <!--     Nombres    -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-7">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }} ">
                                            <label for="input-name"
                                                   class="bmd-label-floating">{{ __('Nombre') }}</label>
                                            <input type="text" name="name" id="input-name"
                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   value="{{ old('name') }}"
                                                   required="true" aria-required="true" />
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      id="input-name"
                                                      for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <!--     Nombres    -->

                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-rose">Agregar tag</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
