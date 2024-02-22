

@extends('Admin.app')

@section('content')

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="/dashboard" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Poultry System</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="{{asset('Admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{auth()->user()->name}}</h6>
                    <span>Farmer</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="/dashboard" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="/user/profile" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Profile</a>
                <a href="/RegisterPoultry" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Register</a>

            </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
            <a href="/dashboard" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input class="form-control bg-dark border-0" type="search" placeholder="Search">
            </form>
            <div class="navbar-nav align-items-center ms-auto">

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="{{asset('Admin/img/user.jpg')}}" alt="{{auth()->user()->name}}" style="width: 40px; height: 40px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="/user/profile" class="dropdown-item">My Profile</a>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                </div>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary rounded p-4">

                        <div class="card">
                            <div class="card-header">{{ __('Register Poultry') }}</div>

                            <div class="card-body">
                                <form method="POST" action="">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="poultry_name" class="form-label">{{ __('Poultry Name') }}</label>
                                        <input id="poultry_name" type="text" class="form-control" name="poultry_name" required autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label for="location" class="form-label">{{ __('Location') }}</label>
                                        <input id="location" type="text" class="form-control" name="location" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="capacity" class="form-label">{{ __('Capacity') }}</label>
                                        <input id="capacity" type="number" class="form-control" name="capacity" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="contact_number" class="form-label">{{ __('Contact Number') }}</label>
                                        <input id="contact_number" type="text" class="form-control" name="contact_number" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea id="description" class="form-control" name="description" rows="3" required></textarea>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>










@endsection
