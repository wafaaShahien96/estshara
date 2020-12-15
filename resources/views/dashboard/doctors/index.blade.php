@extends('dashboard.layouts.app')

@section('title', __('trans.doctors'))

@section('content')

    @include('dashboard.layouts.includes.alerts.success')
    @include('dashboard.layouts.includes.alerts.errors')

    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                    @lang('trans.doctors')
                </h3>

                <span class="kt-subheader__separator kt-hidden"></span>

                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>

                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('admin.home') }}" class="kt-subheader__breadcrumbs-link"> @lang('trans.home') </a>
                </div>
            </div>

        </div>
    </div>
    <!-- end:: Content Head -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


        <!--Begin::Row-->
        <div class="card card-custom">
            <div class="card-header">
            <div class="card-title">
            </div>
            <div class="card-toolbar">

                {{-- @can('admin-create') --}}
                <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>@lang('trans.add doctor')
                </a>
                {{-- @endcan --}}

                <!--end::Button-->
            </div>
            </div>

            <div class="card-body">
            @if (count($doctors) > 0)
            <table class="table table-hover text-center" id=" example">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('trans.name')</th>
                    <th scope="col">@lang('trans.phone')</th>
                    <th scope="col">@lang('trans.email')</th>
                    <th scope="col">@lang('trans.gender')</th>
                    <th scope="col">@lang('trans.country')</th>
                    <th scope="col">@lang('trans.actions')</th>

                </tr>
                </thead>

                <tbody>
                    @isset($doctors)
                    @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{$doctor->id}}</td>
                                <td>{{$doctor->first_name . " " .$doctor->last_name }}</td>
                                <td>{{$doctor->phone}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>{{ App\Models\Country::find($doctor->country_id)->name }}</</td>
                                <td>{{$doctor->gender}}</td>
                                <td>
                                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('trans.edit')</a>
                                    {{-- <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $doctor->id }}" data-action="{{ route('admin.doctors.destroy',$doctor->id) }}" onclick="deleteConfirmation({{$doctor->id}})"><i class="fa fa-trash"></i> @lang('trans.delete')</button> --}}
                                    <form class="delete_form d-inline-block" action="{{ route('admin.doctors.destroy',$doctor->id) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button class="delete_btn btn btn-danger btn-flat btn-sm" type="button">
                                            <i class="fa fa-trash"></i> @lang('trans.delete')
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>

            </table>
            @else
                <p>@lang('trans.no_data_found')</p>
            @endif
            </div>

            <div class="card-footer">
                {{ $doctors->links() }}
            </div>
        </div>


        <!--End::Row-->

        <!--End::Dashboard 1-->
    </div>
    <!-- end:: Content -->
@endsection

@push('js')
    <script>
        //delete items
        $(document).on("click", 'button.delete_btn', function () {
            let target_form = $(this).closest(".delete_form");
            let cancel_txt =  '{{ __("trans.cancel") }}';
            let ok_txt = '{{ __("trans.ok") }}';
            Swal.fire({
                title: '{{ __("trans.Are you sure?") }}',
                text: '{{ __("trans.warn deletion") }}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085D6',
                cancelButtonColor: '#d33',
                confirmButtonText: ok_txt,
                cancelButtonText: cancel_txt,
            }).then((result) => {
                if (result.value) {
                    $(target_form).submit();
                }
            });
        });
    </script>
@endpush

