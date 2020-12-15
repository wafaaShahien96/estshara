@extends('dashboard.layouts.app')

@section('content')

  <!-- begin:: Content Head -->
  <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('trans.edit user')
            </h3>

            <span class="kt-subheader__separator kt-hidden"></span>

            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.users.index') }}" class="kt-subheader__breadcrumbs-link">
                    @lang('trans.users')
                </a>

                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.home') }}" class="kt-subheader__breadcrumbs-link">
                @lang('trans.home')
                </a>
            </div>
        </div>

    </div>
</div>
<!-- end:: Content Head -->

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>@lang('trans.edit user')</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">

                            <label for="email">@lang('trans.email')</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone">@lang('trans.phone')</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}">

                            @error('phone')
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
                        <label for="name">@lang('trans.first_name')</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $user->first_name) }}">

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="last_name">@lang('trans.last_name')</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $user->last_name) }}">

                        @error('last_name')
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
                        <label for="age">@lang('trans.age')</label>
                        <input type="number" class="form-control" name="age" value="{{ old('age', $user->age) }}">
                    </div>
                    </div>

                    <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('trans.gender')</label>

                        <select class="form-control" name="gender">

                            <option value="male" {{ $user->gender == 'male' ? 'selected' : ''}}>@lang('trans.male')</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : ''}}>@lang('trans.female')</option>

                        </select>
                    </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-6">
                    <div class="form-group">
                    <label for="status">@lang('trans.status')</label>

                    <select class="form-control" name="is_active">

                        <option value="inactive" {{ $user->is_active == 'inactive' ? 'selected' : ''}}>@lang('trans.inactive')</option>
                        <option value="active" {{ $user->is_active == 'active' ? 'selected' : ''}}>@lang('trans.active')</option>

                    </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">@lang('trans.countries')</label>

                    <select class="form-control" name="country_id">

                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id', $user->country_id) == $country->id ? 'selected' : ''}}>{{ $country->name }}</option>
                        @endforeach


                    </select>
                    </div>
                </div>
                </div>



                <div class="form-group">
                    <label>@lang('trans.image')</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">@lang('trans.choose_file')</label>
                    </div>
                </div>



                <div class="float-right">
                    <button class="btn btn-primary">@lang('trans.update')</button>
                    <a type="button" class="btn btn-success ml-3 " href="{{ route('admin.users.index') }}">@lang('trans.back')</a>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection





