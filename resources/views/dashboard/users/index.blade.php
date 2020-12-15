@extends('dashboard.layouts.app')

@section('title', __('trans.users'))

@section('content')

@include('dashboard.layouts.includes.alerts.success')
@include('dashboard.layouts.includes.alerts.errors')
<!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                    @lang('trans.users')
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

    <!--Begin::Dashboard 1-->

    <!--Begin::Row-->

      <div class="card card-custom">
        <div class="card-header">
          <div class="card-title">

          </div>
          <div class="card-toolbar">

            <!--begin::Button-->
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary font-weight-bolder">
            <i class="la la-plus"></i>@lang('trans.add user')</a>
            <!--end::Button-->
          </div>
        </div>

        <div class="card-body">
         @if (count($users) > 0)
         <table class="table table-hover text-center" id=" example">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('trans.name')</th>

                <th scope="col">@lang('trans.phone')</th>
                <th scope="col">@lang('trans.image')</th>
                <th scope="col">@lang('trans.country')</th>
                <th scope="col">@lang('trans.age')</th>
                <th scope="col">@lang('trans.gender')</th>
                <th scope="col">@lang('trans.email')</th>
                <th scope="col">@lang('trans.status')</th>
                <th scope="col">@lang('trans.actions')</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $index => $user)
            <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ $user->first_name }}  {{ $user->last_name }}</td>
              <td>{{ $user->phone }}</td>
              <td>

                @if(!($user->image))
                <img src="{{ asset('storage/images/users/male.png') }}" alt="image" class="img-thumbnail" width="80px;">
                @else
                <img src="{{ asset('storage/images/users/' . $user->image) }}" alt="image" class="img-thumbnail" width="80px;">
                @endif

              </td>
              <td>{{ $user->country->name }}</td>
              <td>{{ $user->age }}</td>
              <td>{{ $user->gender }}</td>
              <td>{{ $user->email }}</td>

              <td data-field="Status" class="kt-datatable__cell">
                @if ($user->is_active == 'active')
                <span style="width: 100px;"><span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">@lang('trans.active')</span></span>
                @else
                <span style="width: 100px;"><span class="btn btn-bold btn-sm btn-font-sm  btn-label-warning">@lang('trans.inactive')</span></span>
                @endif
              </td>
              <td>

              {{-- @can('admin-edit') --}}
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> @lang('trans.edit')
                </a>
              {{-- @endcan --}}


              {{-- <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $user->id }}" data-action="{{ route('admin.users.destroy',$user->id) }}" onclick="deleteConfirmation({{$user->id}})"><i class="fa fa-trash"></i>
                @lang('trans.delete')
              </button> --}}

              <form class="delete_form d-inline-block" action="{{ route('admin.users.destroy',$user->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <button class="delete_btn btn btn-danger btn-flat btn-sm" type="button">
                    <i class="fa fa-trash"></i> @lang('trans.delete')
                </button>
            </form>



              <!-- end of form -->
            {{-- @endcan --}}

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
        {{ $users->links() }}
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



