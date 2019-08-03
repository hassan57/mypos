@extends('layouts.dashboard.app')
@push('css')
<style>
    .search_close{
        position: absolute;
        left: 17%;
        top: 31%;
        z-index: 999;
        cursor: pointer;
        font-size: 12px;
        color: #888;
    }
</style>
@endpush
@push('js')
<script>
    (function(){
    //get  ADD IN BOOK LIST button
    //get bookname tagname


    $('.search_close').on('click', function(event){
        $('.search').find('input').val('');
        
    });
    })();
</script>
@endpush
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>@lang('site.users') <small>{{$users->count()}}</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li class="active"><a href="{{route('dashboard.users.index')}}">@lang('site.users')</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">@lang('site.users')</h3>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-4">
                        {!! Form::open(['url' => route('dashboard.users.index'),'method' => 'get']) !!}
                            <div class="input-group input-group-m">
                                <i class="search_close fa fa-close"></i>
                            <input type="text" name="search" value="{{request()->search}}" class="form-control search" placeholder="@lang('site.search')">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary" style="width:50px"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        {!! Form::close() !!}   
                    </div>
                    @if (auth()->user()->hasPermission('create_users')) 
                        <div class="col-md-4" style="margin-right: -18px;">
                            <a href="{{route('dashboard.users.create')}}" class="btn btn-primary">
                                <i class="fa fa-plus"></i>  @lang('site.create')
                            </a>
                        </div>
                    @endif
                </div>
            </div><!-- end of box-header -->

            <div class="box-body">
            @if ($users->count() > 0)
               <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('site.first_name')</th>
                            <th>@lang('site.last_name')</th>
                            <th>@lang('site.email')</th>
                            <th>@lang('site.image')</th>
                            <th>@lang('site.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index=>$user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                            <td><img src="{{ $user->image_path }}" style="width:80px; height:50px;" class="img-thumbnail" alt="{{$user->name}}"/></td>
                                <td>
                                    @if (auth()->user()->hasPermission('update_users'))
                                        <a href="{{ route('dashboard.users.edit',$user->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i>  @lang('site.edit')</a>              
                                    @else
                                        <button  class="btn btn-sm btn-info disabled"> <i class="fa fa-edit"></i>  @lang('site.edit')</button>              
                                    @endif
                                    @if (auth()->user()->hasPermission('delete_users'))
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$user->id}}"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                    @endif
                                </td>
                            </tr>
                            <!-- Start Modal For Delete -->
                            @if (auth()->user()->hasPermission('delete_users'))
                                <div id="myModal{{$user->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h3 class="modal-title">@lang('site.confirm_delete')</h3>
                                            </div> 
                                            {!! Form::open(['route' => ['dashboard.users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                            <div class="modal-body alert alert-danger " style="margin: 0 15px">
                                                    <h4>{{trans('site.delete_this',['name' => $user->first_name])}}</h4>
                                            </div>
                                            <div class="modal-footer">
                                                {!!Form::submit(trans('site.yes'),["class" => "btn btn-danger "])!!}
                                                <button type="button" class="btn btn-info" data-dismiss="modal">{{trans('site.no')}}</button>
                                            </div>
                                            {!! Form::close() !!}       
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                {{ $users->appends(request()->query())->links() }}
            @else
                <h2>@lang('site.no_data_found')</h2>           
            @endif
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section> 
   
</div>

@endsection


