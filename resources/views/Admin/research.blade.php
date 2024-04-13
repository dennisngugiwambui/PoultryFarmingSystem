@extends('Admin.app')

@section('content')
        <style>
            /* Style the main container */
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        /* Style the chat log */
        #chat-log {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #ffffff;
        }

        /* Style the chat form */
        #chat-form {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #f1f1f1;
            border-top: 1px solid #ccc;
        }

        /* Style the chat input field */
        #user-message {
            flex: 1;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        /* Style the chat send button */
        #chat-form button {
            padding: 8px 12px;
            border-radius: 4px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        /* Change button color on hover */
        #chat-form button:hover {
            background-color: #0056b3;
        }

        /* Style the chat log messages */
        #chat-log p {
            margin: 5px 0;
        }

        /* Style for user messages */
        #chat-log p:nth-child(even) {
            font-weight: bold;
            color: #007bff;
        }

        /* Style for AI messages */
        #chat-log p:nth-child(odd) {
            color: #6c757d;
        }
    </style>


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
                <a href="/dashboard" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="/user/profile" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Profile</a>
                <a href="/RegisterPoultry" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Poultry</a>
                <a href="/eggs" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Eggs</a>
                <a href="/sales" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Sales</a>
                <a href="/employees" class="nav-item nav-link"><i class="fa fa-list-alt"></i>Employees</a>
                <a href="/news" class="nav-item nav-link"><i class="fa fa-list-alt"></i>Others</a>

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

        <!-- Poultry Farming Information Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas fa-egg fa-3x text-warning"></i>
                        <div class="ms-3">
                            <p class="mb-2">Eggs Laid Today</p>
                            <h6 class="mb-0">{{$todaysEggs}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas fa-layer-group fa-3x text-warning"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Poultry Registered</p>
                            <h6 class="mb-0">{{$Count}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas fa-dollar-sign fa-3x text-success"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total eggs</p>
                            <h6 class="mb-0">{{$eggs}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas fa-dollar-sign fa-3x text-success"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Revenue</p>
                            <h6 class="mb-0">Ksh. {{$totalSales}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Poultry Farming Information End -->

        <!-- Poultry Products Sales -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Poultry Products Sales</h6>
                </div>

                <!-- Sales Entry Form -->
                <!-- Sales Entry Form -->
                <form action="{{ route('sales') }}" method="post" id="salesForm">
                    @csrf
                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="buyerName" class="form-label">Buyer Name</label>
                                <input type="text" class="form-control" id="buyerName" name="buyerName" required>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <!-- jQuery script to update price field -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#productType').change(function() {
                            // Fetch the corresponding price for the selected sales type
                            let selectedOption = $(this).find(':selected');
                            let selectedPrice = selectedOption.data('price');
                            $('#price').val(selectedPrice ? selectedPrice : '');
                        });
                    });
                </script>


                <script>
                    function calculateTotal() {
                        let price = parseFloat(document.getElementById('price').value);
                        let quantity = parseFloat(document.getElementById('quantity').value);
                        let total = price * quantity;
                        document.getElementById('total').value = isNaN(total) ? '' : total.toFixed(2);
                    }
                </script>

                <!-- Add this script after your previous JavaScript code -->
                <script>
                    function validateQuantity() {
                        let selectedType = document.getElementById('productType');
                        let selectedQuantity = parseFloat(document.getElementById('quantity').value);

                        if (!selectedType || isNaN(selectedQuantity)) {
                            return true; // Validation will be handled by HTML5 'required' attribute
                        }

                        let availableCount = parseFloat(selectedType.options[selectedType.selectedIndex].dataset.count);

                        if (selectedQuantity > availableCount) {
                            alert('Error: Quantity exceeds available count.');
                            return false;
                        }

                        return true;
                    }

                    // Add the onsubmit attribute to your form
                    document.getElementById('salesForm').onsubmit = validateQuantity;
                </script>








                <!-- Sales Entry Form End -->

            </div>


    </div>
    <!-- Add Eggs Modal End -->

@endsection

