@extends('Users.app')


@section('content')

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <p class="mb-0">{{auth()->user()->name}}</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo"></div>
                                <div class="profile-photo">
                                    <img src="{{asset('Users/images/profile/profile.png')}}" class="img-fluid rounded-circle" alt="">
                                </div>
                            </div>
                            <div class="profile-info">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8">
                                        <div class="row">
                                            <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                <div class="profile-name">
                                                    <h4 class="text-primary">{{auth()->user()->name}}</h4>
                                                    <p>user name</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                <div class="profile-email">
                                                    <h4 class="text-muted">{{auth()->user()->email}}</h4>
                                                    <p>Email</p>
                                                </div>
                                            </div>
                                            <!-- <div class="col-xl-4 col-sm-4 prf-col">
                                                <div class="profile-call">
                                                    <h4 class="text-muted">(+1) 321-837-1030</h4>
                                                    <p>Phone No.</p>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">

                                        <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show">About Me</a>
                                        </li>
                                        <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Details</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <h4 class="text-primary">About Me</h4>
                                                    <p>
                                                        As a dedicated poultry farmer, my passion lies in nurturing and producing high-quality poultry products. With years of experience and a commitment to ethical farming practices, I prioritize the well-being of my flock and ensure they thrive in a healthy environment. Through my relentless dedication, I aim to contribute to the sustainable and responsible production of poultry, providing customers with wholesome and delicious products they can trust.
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="profile-lang pt-5 border-bottom-1 pb-5">
                                                <h4 class="text-primary mb-4">Language</h4><a href="javascript:void()" class="text-muted pr-3 f-s-16"><i
                                                        class="flag-icon flag-icon-us"></i> English</a> <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i
                                                        class="flag-icon flag-icon-fr"></i> Kiswahili</a>

                                            </div>
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{auth()->user()->name}}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{auth()->user()->email}}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Skills <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9"><span>Full time poultry farming</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>N/A</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Phone<span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9"><span>{{auth()->user()->phone}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="profile-settings" class="tab-pane fade">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    <h4 class="text-primary">Account Setting</h4>
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Email</label>
                                                                <input type="email" placeholder="Email" class="form-control" value="{{auth()->user()->email}}" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Password</label>
                                                                <input type="password" placeholder="Password" value="{{auth()->user()->password}}" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" placeholder="1234 Main St" value="{{auth()->user()->name}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" placeholder="Apartment, studio, or floor" value="{{auth()->user()->phone}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Joined on</label>
                                                                <input type="text" value="{{auth()->user()->created_at}}" class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Age</label>
                                                                <input type="text" value="N/A" class="form-control" readonly>

                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label>Priviledge</label>
                                                                <input type="text" value="{{auth()->user()->usertype}}" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="gridCheck">
                                                                <label for="gridCheck" class="form-check-label">Check me out</label>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


@endsection
