@extends('layouts.dashboard.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            @lang('site.users')
            <small>@lang('site.create')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="{{route('dashboard.users.index')}}">@lang('site.users')</a></li>
            <li class="active"><a href="{{route('dashboard.users.index')}}">@lang('site.create')</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">@lang('site.create_user')</h3>
        </div>
        <div class="box-body ">
  
        {!! Form::open(['url'=> route('dashboard.users.store'),'method' => 'POST','files'=>true]) !!}

            <div class="form-group {!! $errors->has('first_name')? 'has-error' : '' !!}">
                {{ Form::label('first_name', trans('site.first_name'), ['class' => 'control-label']) }}
                {{ Form::text('first_name', old('first_name'), ['class' => 'form-control']) }}
                <span class="help-block">{!! $errors->has('first_name')? $errors->first('first_name') : ''!!}</span>
            </div>

            <div class="form-group {!! $errors->has('last_name')? 'has-error' : '' !!}">
                {{ Form::label('last_name', trans('site.last_name'), ['class' => 'control-label']) }}
                {{ Form::text('last_name', old('last_name'), ['class' => 'form-control']) }}
                <span class="help-block">{!! $errors->has('last_name')? $errors->first('last_name') : ''!!}</span>
            </div>

            <div class="form-group {!! $errors->has('email')? 'has-error' : '' !!}">
                {{ Form::label('email', trans('site.email'), ['class' => 'control-label']) }}
                {{ Form::email('email', old('email'), ['class' => 'form-control']) }}
                <span class="help-block">{!! $errors->has('email')? $errors->first('email') : ''!!}</span>
            </div>

             <div class="form-group {!! $errors->has('image')? 'has-error' : '' !!}">
                {{ Form::label('image', trans('site.image'), ['class' => 'control-label']) }}
                {{ Form::File('image', ['class' => 'form-control border-input image']) }}
                <span class="help-block">{!! $errors->has('image')? $errors->first('image') : ''!!}</span>
            </div>
            <div class="form-group">
                <img src="{{ asset('uploads/user_image/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
            </div>

            <div class="form-group {!! $errors->has('password')? 'has-error' : '' !!}">
                {{ Form::label('password', trans('site.password'), ['class' => 'control-label']) }}
                {{ Form::password('password',['class' => 'form-control']) }}
                <span class="help-block">{!! $errors->has('password')? $errors->first('password') : ''!!}</span>
            </div>

            <div class="form-group {!! $errors->has('password')? 'has-error' : '' !!}">
                {{ Form::label('password', trans('site.password_confirmation'), ['class' => 'control-label']) }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                <span class="help-block">{!! $errors->has('password')? $errors->first('password') : ''!!}</span>
            </div>

            <div class="form-group {!! $errors->has('permissions')? 'has-error' : '' !!}">
                <label>@lang('site.permissions')</label>
                <div class="nav-tabs-custom">
                    @php
                        $models = ['users', 'categories', 'products', 'clients', 'orders'];
                        $maps = ['create', 'read', 'update', 'delete'];
                    @endphp

                    <ul class="nav nav-tabs">
                        @foreach ($models as $index=>$model)
                            <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        @foreach ($models as $index=>$model)
                            <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">
                                @foreach ($maps as $map)
                                    <label><input type="checkbox" name="permissions[]" value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>
                                @endforeach
                            </div>
                        @endforeach
                    </div><!-- end of tab content -->
                </div><!-- end of nav tabs --> 
                <span class="help-block">{!! $errors->has('permissions')? $errors->first('permissions') : ''!!}</span>

            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
            </div>
        </div>

  </div>
       
               
    </section> 

</div>

@endsection


