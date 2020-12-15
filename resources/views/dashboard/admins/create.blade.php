@extends('dashboard.layouts.app')

@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('trans.add admin')
            </h3>

            <span class="kt-subheader__separator kt-hidden"></span>

            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.admins.index') }}" class="kt-subheader__breadcrumbs-link">
                    @lang('trans.admins')
                </a>

                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.home') }}" class="kt-subheader__breadcrumbs-link">
                @lang('trans.home')
                </a>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>@lang('trans.add user')</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.admins.store')}}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">@lang('trans.email')</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                     <div class="col-6">
                        <div class="form-group">
                            <label for="name">@lang('trans.name')</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">@lang('trans.password')</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                     <div class="col-6">
                        <div class="form-group">
                            <label for="password">@lang('trans.confirm_password')</label>
                            <input type="password" class="form-control" name="password_confirmation">

                        </div>
                     </div>
                 </div>


                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">@lang('trans.roles')</label>

                            <select class="form-control" name="roles[]">
                                @foreach ($roles as  $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

                            </select>


                        </div>
                    </div>

                   <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('trans.status')</label>

                        <select class="form-control" name="active">

                            <option value="1" {{ old('active') == 1 ? 'selected' : ''}}>@lang('trans.active')</option>
                            <option value="0" {{ old('active') == 0 ? 'selected' : ''}}>@lang('trans.inactive')</option>


                        </select>

                    </div>

                   </div>
                </div>

                <div class="float-right">
                    <button class="btn btn-primary">@lang('trans.save')</button>
                    <a type="button" class="btn btn-success ml-3 " href="{{ route('admin.admins.index') }}">@lang('trans.back')</a>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection





