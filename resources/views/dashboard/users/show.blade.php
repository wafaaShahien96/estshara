@extends('dashboard.layouts.app')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

  <!-- begin:: Subheader -->
  <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
          <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
          @lang('dash.profile') </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
          <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
          <span class="kt-subheader__breadcrumbs-separator"></span>
          <a href="{{ route('admin.users.index') }}" class="kt-subheader__breadcrumbs-link">
            @lang('dash.users') </a>
       
          <span class="kt-subheader__breadcrumbs-separator"></span>
          <a href="" class="kt-subheader__breadcrumbs-link">
            Personal Information </a>

          <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
        </div>
      </div>
      {{-- <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">
          <a href="#" class="btn kt-subheader__btn-primary">
            Actions &nbsp;

            <!--<i class="flaticon2-calendar-1"></i>-->
          </a>
          <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="" data-placement="left" data-original-title="Quick actions">
            <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24"></polygon>
                  <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                  <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000"></path>
                </g>
              </svg>

              <!--<i class="flaticon2-plus"></i>-->
            </a>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

              <!--begin::Nav-->
              <ul class="kt-nav">
                <li class="kt-nav__head">
                  Add anything or jump to:
                  <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                </li>
                <li class="kt-nav__separator"></li>
                <li class="kt-nav__item">
                  <a href="#" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon2-drop"></i>
                    <span class="kt-nav__link-text">Order</span>
                  </a>
                </li>
                <li class="kt-nav__item">
                  <a href="#" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                    <span class="kt-nav__link-text">Ticket</span>
                  </a>
                </li>
                <li class="kt-nav__item">
                  <a href="#" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                    <span class="kt-nav__link-text">Goal</span>
                  </a>
                </li>
                <li class="kt-nav__item">
                  <a href="#" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon2-new-email"></i>
                    <span class="kt-nav__link-text">Support Case</span>
                    <span class="kt-nav__link-badge">
                      <span class="kt-badge kt-badge--success">5</span>
                    </span>
                  </a>
                </li>
                <li class="kt-nav__separator"></li>
                <li class="kt-nav__foot">
                  <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                  <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Click to learn more...">Learn more</a>
                </li>
              </ul>

              <!--end::Nav-->
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>

  <!-- end:: Subheader -->

  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::App-->
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

      <!--Begin:: App Aside Mobile Toggle-->
      <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
        <i class="la la-close"></i>
      </button>

      <!--End:: App Aside Mobile Toggle-->

      <!--Begin:: App Aside-->
      <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

        <!--begin:: Widgets/Applications/User/Profile1-->
        <div class="kt-portlet ">
          <div class="kt-portlet__head  kt-portlet__head--noborder">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
              </h3>
            </div>
            {{-- <div class="kt-portlet__head-toolbar">
              <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">
                <i class="flaticon-more-1"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md" style="">

                <!--begin::Nav-->
                <ul class="kt-nav">
                  <li class="kt-nav__head">
                    Export Options
                    <span data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Click to learn more...">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <rect x="0" y="0" width="24" height="24"></rect>
                          <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                          <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"></rect>
                          <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"></rect>
                        </g>
                      </svg> </span>
                  </li>
                  <li class="kt-nav__separator"></li>
                  <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                      <i class="kt-nav__link-icon flaticon2-drop"></i>
                      <span class="kt-nav__link-text">Activity</span>
                    </a>
                  </li>
                  <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                      <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                      <span class="kt-nav__link-text">FAQ</span>
                    </a>
                  </li>
                  <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                      <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                      <span class="kt-nav__link-text">Settings</span>
                    </a>
                  </li>
                  <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                      <i class="kt-nav__link-icon flaticon2-new-email"></i>
                      <span class="kt-nav__link-text">Support</span>
                      <span class="kt-nav__link-badge">
                        <span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
                      </span>
                    </a>
                  </li>
                  <li class="kt-nav__separator"></li>
                  <li class="kt-nav__foot">
                    <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade plan</a>
                    <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Click to learn more...">Learn more</a>
                  </li>
                </ul>

                <!--end::Nav-->
              </div>
            </div> --}}
          </div>
          <div class="kt-portlet__body kt-portlet__body--fit-y">

            <!--begin::Widget -->
            <div class="kt-widget kt-widget--user-profile-1">
              <div class="kt-widget__head">
                <div class="kt-widget__media">
                
                 @if(!($user->image))
                 <img src="{{ asset('storage/images/users/male.png') }}" alt="image">
                 @else
                 <img src="{{ asset('storage/images/users/' . $user->image) }}" alt="image">
                 @endif
                </div>
                <div class="kt-widget__content">
                  <div class="kt-widget__section">
                    <a href="#" class="kt-widget__username">
                     {{ $user->first_name}} {{ $user->last_name }}
                      <i class="flaticon2-correct kt-font-success"></i>
                    </a>
                    {{-- <span class="kt-widget__subtitle">
                      Head of Development
                    </span> --}}
                  </div>
                  {{-- <div class="kt-widget__action">
                    <button type="button" class="btn btn-info btn-sm">chat</button>&nbsp;
                    <button type="button" class="btn btn-success btn-sm">follow</button>
                  </div> --}}
                </div>
              </div>
              <div class="kt-widget__body">
                <div class="kt-widget__content">
                  <div class="kt-widget__info">
                    <span class="kt-widget__label">Email:</span>
                    <a href="#" class="kt-widget__data">{{ $user->email }}</a>
                  </div>
                  <div class="kt-widget__info">
                    <span class="kt-widget__label">Phone:</span>
                    <a href="#" class="kt-widget__data">{{ $user->phone }}</a>
                  </div>
                  <div class="kt-widget__info">
                    <span class="kt-widget__label">Age:</span>
                    <a href="#" class="kt-widget__data">{{ $user->age }}</a>
                  </div>
                  <div class="kt-widget__info">
                    <span class="kt-widget__label">Gender:</span>
                    <a href="#" class="kt-widget__data">{{ $user->gender }}</a>
                  </div>
                  <div class="kt-widget__info">
                    <span class="kt-widget__label">Location:</span>
                    <span class="kt-widget__data">{{ $user->country->name }}</span>
                  </div>
                </div>
                {{-- <div class="kt-widget__items">
                  <a href="custom/apps/user/profile-1/overview.html" class="kt-widget__item ">
                    <span class="kt-widget__section">
                      <span class="kt-widget__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
                          </g>
                        </svg> </span>
                      <span class="kt-widget__desc">
                        Profile Overview
                      </span>
                    </span>
                  </a>
                  <a href="custom/apps/user/profile-1/personal-information.html" class="kt-widget__item kt-widget__item--active">
                    <span class="kt-widget__section">
                      <span class="kt-widget__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                          </g>
                        </svg> </span>
                      <span class="kt-widget__desc">
                        Personal Information
                      </span>
                    </span>
                  </a>
                  <a href="custom/apps/user/profile-1/account-information.html" class="kt-widget__item ">
                    <span class="kt-widget__section">
                      <span class="kt-widget__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"></path>
                          </g>
                        </svg> </span>
                      <span class="kt-widget__desc">
                        Account Information
                      </span>
                      
                  </span></a>
                  <a href="custom/apps/user/profile-1/change-password.html" class="kt-widget__item ">
                    <span class="kt-widget__section">
                      <span class="kt-widget__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"></path>
                          </g>
                        </svg> </span>
                      <span class="kt-widget__desc">
                        Change Passwort
                      </span>
                    </span>
                    <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder">5</span>
                  </a>
                  <a href="custom/apps/user/profile-1/email-settings.html" class="kt-widget__item ">
                    <span class="kt-widget__section">
                      <span class="kt-widget__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
                          </g>
                        </svg> </span>
                      <span class="kt-widget__desc">
                        Email settings
                      </span>
                    </span>
                  </a>
                  <a href="#" class="kt-widget__item" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="Coming soon...">
                    <span class="kt-widget__section">
                      <span class="kt-widget__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <rect fill="#000000" x="2" y="5" width="19" height="4" rx="1"></rect>
                            <rect fill="#000000" opacity="0.3" x="2" y="11" width="19" height="10" rx="1"></rect>
                          </g>
                        </svg> </span>
                      <span class="kt-widget__desc">
                        Saved Credit Cards
                      </span>
                    </span>
                  </a>
                  <a href="#" class="kt-widget__item" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="Coming soon...">
                    <span class="kt-widget__section">
                      <span class="kt-widget__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                            <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"></rect>
                            <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"></rect>
                          </g>
                        </svg> </span>
                      <span href="#" class="kt-widget__desc">Tax information</span>
                    </span>
                    <span class="kt-badge kt-badge--unified-brand kt-badge--inline kt-badge--bolder">new</span>
                  </a>
                  <a href="#" class="kt-widget__item" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="Coming soon...">
                    <span class="kt-widget__section">
                      <span class="kt-widget__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"></rect>
                            <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3"></path>
                          </g>
                        </svg> </span>
                      <span class="kt-widget__desc">
                        Statements
                      </span>
                    </span>
                  </a>
                </div> --}}
              </div>
            </div>

            <!--end::Widget -->
          </div>
        </div>

        <!--end:: Widgets/Applications/User/Profile1-->
      </div>

      <!--End:: App Aside-->

      <!--Begin:: App Content-->
      <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
        <div class="row">
          <div class="col-xl-12">
            <div class="kt-portlet">
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">Personal Information <small>update your personal informaiton</small></h3>
                </div>
                {{-- <div class="kt-portlet__head-toolbar">
                  <div class="kt-portlet__head-wrapper">
                    <div class="dropdown dropdown-inline">
                      <button type="button" class="btn btn-label-brand btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flaticon2-gear"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <ul class="kt-nav">
                          <li class="kt-nav__section kt-nav__section--first">
                            <span class="kt-nav__section-text">Export Tools</span>
                          </li>
                          <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                              <i class="kt-nav__link-icon la la-print"></i>
                              <span class="kt-nav__link-text">Print</span>
                            </a>
                          </li>
                          <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                              <i class="kt-nav__link-icon la la-copy"></i>
                              <span class="kt-nav__link-text">Copy</span>
                            </a>
                          </li>
                          <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                              <i class="kt-nav__link-icon la la-file-excel-o"></i>
                              <span class="kt-nav__link-text">Excel</span>
                            </a>
                          </li>
                          <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                              <i class="kt-nav__link-icon la la-file-text-o"></i>
                              <span class="kt-nav__link-text">CSV</span>
                            </a>
                          </li>
                          <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                              <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                              <span class="kt-nav__link-text">PDF</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div> --}}
              </div>
              <form class="kt-form kt-form--label-right">
                <div class="kt-portlet__body">
                  <div class="kt-section kt-section--first">
                    <div class="kt-section__body">
                      <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                          <h3 class="kt-section__title kt-section__title-sm">Customer Info:</h3>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                        <div class="col-lg-9 col-xl-6">
                          <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                            <div class="kt-avatar__holder" style="background-image: url(Dashboard/assets/media/users/100_13.jpg)"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                              <i class="fa fa-pen"></i>
                              <input type="file" name="image" accept=".png, .jpg, .jpeg">
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                              <i class="fa fa-times"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                        <div class="col-lg-9 col-xl-6">
                          <input class="form-control" type="text" value="{{ old('first_name', $user->first_name) }}" name="first_name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-lg-9 col-xl-6">
                          <input class="form-control" type="text" value="{{ old('last_name', $user->last_name) }}" name="last_name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('dash.countries')</label>
                        <div class="col-lg-9 col-xl-6">
                          <div class="form-group">
                            {{-- <label for="exampleFormControlSelect1">@lang('dash.countries')</label> --}}
                           
                            <select class="form-control" name="country_id">
                               
                               @foreach ($countries as $country)
                               <option value="{{ $country->id }}">{{ $country->name }}</option>
                               @endforeach
                              
                               
                            </select>
                          </div>
                        
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                          <h3 class="kt-section__title kt-section__title-sm">Contact Info:</h3>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                        <div class="col-lg-9 col-xl-6">
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                            <input type="text" class="form-control" value="{{ old('phone', $user->phone) }}" placeholder="Phone" name="phone" aria-describedby="basic-addon1">
                          </div>
                          <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                        <div class="col-lg-9 col-xl-6">
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                            <input type="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="Email" name="email" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div>
                      {{-- <div class="form-group form-group-last row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
                        <div class="col-lg-9 col-xl-6">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pass" value="loop">
                            <div class="input-group-append"><span class="input-group-text">.com</span></div>
                          </div>
                        </div>
                      </div> --}}

                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                        <div class="col-lg-9 col-xl-6">
                          <input type="password" class="form-control" name="password" placeholder="New password">
                        </div>
                      </div>

                      <div class="form-group form-group-last row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Verify Password</label>
                        <div class="col-lg-9 col-xl-6">
                          <input type="password" class="form-control" name="password_confirmation" placeholder="Verify password">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="kt-portlet__foot">
                  <div class="kt-form__actions">
                    <div class="row">
                      <div class="col-lg-3 col-xl-3">
                      </div>
                      <div class="col-lg-9 col-xl-9">
                        <button type="reset" class="btn btn-success">Submit</button>&nbsp;
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!--End:: App Content-->
    </div>

    <!--End::App-->
  </div>

  <!-- end:: Content -->
</div>

@endsection




