@extends('dashboard.layouts.app')

@section('title', __('trans.admins'))

@section('content')

@include('dashboard.layouts.includes.alerts.success')
@include('dashboard.layouts.includes.alerts.errors')
    <!-- begin:: Content Head -->
 <!-- begin:: Content Head -->
 <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('trans.admins')
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
    <!-- end:: Content Head -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div class="card card-custom">
            <div class="card-header">
            <div class="card-title">
            </div>
            <div class="card-toolbar">

                {{-- @can('admin-create') --}}
                <a href="{{ route('admin.admins.create') }}" class="btn btn-primary font-weight-bolder">
                <i class="la la-plus"></i>@lang('trans.add admin')
                </a>
                {{-- @endcan --}}

                <!--end::Button-->
            </div>
            </div>

            <div class="card-body">
            @if (count($admins) > 0)
            <table class="table table-hover text-center" id=" example">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('trans.name')</th>
                    <th scope="col">@lang('trans.roles')</th>
                    <th scope="col">@lang('trans.email')</th>
                    <th scope="col">@lang('trans.status')</th>
                    <th scope="col">@lang('trans.actions')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($admins as $index => $admin)
                <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $admin->name }}</td>

                @foreach ($admin->roles as $role)
                <td>{{  $role->name}}</td>
                @endforeach
                <td>{{ $admin->email }}</td>
                <td data-field="Status" class="kt-datatable__cell">
                    @if ($admin->active == 1)
                    <span style="width: 100px;"><span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">@lang('trans.active')</span></span>
                    @else
                    <span style="width: 100px;"><span class="btn btn-bold btn-sm btn-font-sm  btn-label-warning">@lang('trans.inactive')</span></span>
                    @endif
                </td>
                <td>
                {{-- @can('admin-edit') --}}
                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('trans.edit')
                    </a>
                {{-- @endcan --}}



                {{-- @can('admin-delete') --}}
                {{-- <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $admin->id }}" data-action="{{ route('admin.admins.destroy',$admin->id) }}" onclick="deleteConfirmation({{$admin->id}})"><i class="fa fa-trash"></i> @lang('trans.delete')</button> --}}
                {{-- @endcan --}}

                <form class="delete_form d-inline-block" action="{{ route('admin.admins.destroy',$admin->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="delete_btn btn btn-danger btn-flat btn-sm" type="button">
                        <i class="fa fa-trash"></i> @lang('trans.delete')
                    </button>
                </form>

                </td>
                </tr>
                @endforeach

                </tbody>
            </table>
            @else
                <p>@lang('trans.no_data_found')</p>
            @endif
            </div>
        <div class="card-footer">
            {{ $admins->links() }}
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



