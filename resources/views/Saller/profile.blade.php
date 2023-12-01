@extends('Saller.layouts.master')
@section('title')
    Profile
@endsection
@section('css')
@endsection
@section('breadcrumb')
Profile
@endsection
@section('page')
Profile
@endsection
@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ URL::asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                        <h2>{{ Auth::guard('saller')->user()->name }}</h2>

                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>


                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="POST" action="{{ url('saller/profile/update') }}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ URL::asset('assets/img/profile-img.jpg') }}" alt="Profile">

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="fullName"
                                                value="{{ $user->name }}">
                                                <x-inline-validation name="name"></x-inline-validation>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email"
                                                value="{{ $user->email }}">
                                                <x-inline-validation name="email"></x-inline-validation>
                                        </div>
                                    </div>

                                    {{-- ------------------------store---------------- --}}

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name Store:</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="namestore" type="text" class="form-control" id="fullName"
                                                value="{{ $user->store->name }}">
                                        </div>
                                        <x-inline-validation name="namestore"></x-inline-validation>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Slug:</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="slug" type="text" class="form-control" id="fullName"
                                                value="{{ $user->store->slug }}">
                                        </div>
                                        <x-inline-validation name="slug"></x-inline-validation>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-md-4 col-lg-3 col-form-label">Logo Store:</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input class="form-control" type="file" name="image_logo"
                                                id="formFile">

                                        </div>
                                    </div>

                                    <fieldset class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Status</label>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                {{-- {{ $user->store->status }} --}}
                                                <input class="form-check-input" type="radio" @checked($user->store->status=1) name="status"
                                                    id="gridRadios1" value="1">

                                                <label class="form-check-label" for="gridRadios1">
                                                    Yes
                                                </label>
                                                <x-inline-validation name="status"></x-inline-validation>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"  @checked($user->store->status=1) name="status"
                                                    id="gridRadios2" value="0">

                                                <label class="form-check-label" for="gridRadios2">
                                                    No
                                                </label>
                                            </div>

                                        </div>
                                        <x-inline-validation name="status"></x-inline-validation>
                                    </fieldset>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="POST" action="{{ url('saller/profile/updatepassword') }}">

                                    @csrf

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>



                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@section('scripts')
@endsection
@endsection
