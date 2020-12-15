@extends('dashboard.layouts.app')

@section('title', __('trans.add doctor'))

@section('content')


    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                    @lang('trans.add doctor')
                </h3>

                <span class="kt-subheader__separator kt-hidden"></span>

                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('admin.doctors.index') }}" class="kt-subheader__breadcrumbs-link">
                        @lang('trans.doctors')
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
                <h3>@lang('trans.add doctor')</h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.doctors.store')}}" method="post" enctype="multipart/form-data">
                    @include('dashboard.layouts.includes.alerts.errors')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            {{-- first_name --}}
                            <div class="form-group">
                                <label for="first_name">@lang('trans.first_name')</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="@lang('trans.first_name') .." value="{{old('first_name')}}" >
                                  @error('first_name')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                        </div>

                        <div class="col-md-6">
                            {{-- last_name --}}
                            <div class="form-group">
                                <label for="last_name">@lang('trans.last_name')</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="@lang('trans.last_name') .." value="{{old('last_name')}}">
                                  @error('last_name')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            {{-- email --}}
                            <div class="form-group">
                                <label for="email">@lang('trans.email')</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="@lang('trans.email') .." value="{{old('email')}}" >
                                  @error('email')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- password --}}
                            <div class="form-group">
                                <label for="password">@lang('trans.password')</label>
                                <input type="password" name="password" id="password" class="form-control" >
                                  @error('password')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {{-- phone --}}
                            <div class="form-group">
                                <label for="phone">@lang('trans.phone')</label>
                                <input type="number" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                                  @error('phone')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- Fees --}}
                            <div class="form-group">
                                <label for="fees">@lang('trans.Fees')</label>
                                <input type="number" name="fees" id="fees" class="form-control" value="{{old('fees')}}">
                                  @error('fees')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- national_id --}}
                            <div class="form-group">
                                <label for="national_id">@lang('trans.national id')</label>
                                <input type="number" name="national_id" id="national_id" class="form-control" value="{{old('national_id')}}">
                                  @error('national_id')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4">
                            {{-- gender --}}
                            <div class="form-group">
                                <label for="gender">@lang('trans.gender')</label>
                                <select name="gender" id="gender" class="form-control" >
                                    <option value="male">@lang('trans.male')</option>
                                    <option value="female">@lang('trans.female')</option>
                                </select>
                                  @error('gender')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            {{-- Country --}}
                            <div class="form-group">
                                <label for="country">@lang('trans.country')</label>
                                <select name="country_id" class="form-control">
                                    <optgroup>
                                        @if($countries && $countries -> count() > 0)
                                            @foreach($countries as $country)
                                                <option value="{{$country->id }}" class="form-control">{{$country->name}}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                  @error('country')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            {{-- Specialty --}}
                            <div class="form-group">
                                <label for="specialty">@lang('trans.specialty')</label>
                                <select name="specialty_id" class="form-control">
                                    <optgroup>
                                        @if($specialties && $specialties -> count() > 0)
                                            @foreach($specialties as $specialty)
                                                <option value="{{$specialty->id }}" class="form-control">{{$specialty->name}}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                  @error('specialty')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{-- bio in English --}}
                            <div class="form-group">
                                <textarea name="bio:en"  rows="3" placeholder="@lang('trans.bio_en') .." class="form-control"></textarea>
                                @error('bio:en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- bio in Arbic --}}
                            <div class="form-group">
                                <textarea name="bio:ar"  rows="3" placeholder="@lang('trans.bio_ar') .." class="form-control"></textarea>
                                @error('bio:ar')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                             {{-- Image --}}
                             <div class="form-group">
                                <label for="image">@lang('trans.image') </label>
                                <input type="file" name="image" id="image" class="form-control" >
                                  @error('image')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                        </div>

                        <div class="col-md-6">
                             {{-- Documents --}}
                             <div class="form-group">
                                <label for="documents">@lang('trans.documents') </label>
                                <input type="file" name="documents[]" id="documents" class="form-control" multiple >
                                  @error('documents')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {{-- doctor status --}}
                            <div class="form-group">
                                <label>@lang('trans.doctor status') </label>
                                <select name="doctor_status" class="form-control">
                                    <optgroup>
                                        <option value="online">@lang('trans.online')</option>
                                        <option value="offline">@lang('trans.offline')</option>
                                        <option value="busy">@lang('trans.busy')</option>
                                    </optgroup>
                                </select>
                                  @error('doctor_status')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{--  Status --}}
                            <div class="form-group">
                                <label>@lang('trans.status')</label>
                                <select name="is_active" class="form-control">
                                    <optgroup>
                                        <option value="waiting_for_review">@lang('trans.waiting_for_review')</option>
                                        <option value="active">@lang('trans.active')</option>
                                        <option value="inactive">@lang('trans.inactive')</option>
                                        <option value="rejected">@lang('trans.rejected')</option>
                                    </optgroup>
                                </select>
                                  @error('doctor_status')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- ex_type --}}
                            <div class="form-group">
                                <label>@lang('trans.examination_type')</label>
                                <select name="ex_type[]" class="form-control" multiple>
                                    <option value="chat" class="form-control">@lang('trans.chat')</option>
                                    <option value="image" class="form-control">@lang('trans.image')</option>
                                    <option value="voice" class="form-control">@lang('trans.voice')</option>
                                    <option value="video" class="form-control">@lang('trans.video')</option>
                                </select>
                                  @error('ex_type')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>

                    <div class="float-right">
                        <button class="btn btn-primary">@lang('trans.save')</button>
                        <a type="button" class="btn btn-success ml-3 " href="{{ route('admin.doctors.index') }}">@lang('trans.back')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
