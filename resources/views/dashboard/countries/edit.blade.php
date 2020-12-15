@extends('dashboard.layouts.app')

@section('title', __('trans.edit country'))


@section('content')


    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                    @lang('trans.edit country')
                </h3>

                <span class="kt-subheader__separator kt-hidden"></span>

                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('admin.countries.index') }}" class="kt-subheader__breadcrumbs-link">
                        @lang('trans.countries')
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
                <h3>@lang('trans.edit country')</h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.countries.update', $country->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value=" {{$country->id}} ">

                    <div class="form-group">
                      <label for="name_en">@lang('trans.name_en')</label>
                      <input type="text" name="name:en" id="name_en" class="form-control" value="{{$country->translate('en')->name}}" >
                        @error('name:en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="name_ar">@lang('trans.name_ar')</label>
                      <input type="text" name="name:ar" id="name_ar" class="form-control" value="{{$country->translate('ar')->name}}" >
                        @error('name:ar')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="currency">@lang('trans.currency')</label>
                      <input type="text" name="currency" id="currency" class="form-control" value="{{$country->currency}}" >
                        @error('currency')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="float-right">
                        <button class="btn btn-primary">@lang('trans.update')</button>
                        <a type="button" class="btn btn-success ml-3 " href="{{ route('admin.countries.index') }}">@lang('trans.back')</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
