@extends('Users.app')

@section('content')

    <!--**********************************
    Content body start
***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">My Profile </div>
                                <div class="stat-digit"> {{auth()->user()->name}}</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Sales</div>
                                <div class="stat-digit"> Ksh.{{$totalSales}}</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Eggs</div>
                                <div class="stat-digit"> {{$eggs}}</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Chickens</div>
                                <div class="stat-digit"> {{$Count}}</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Chickens Records</h4>
                            <div class="table-responsive">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Chickens" aria-label="Search Chickens" aria-describedby="search-chickens">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" id="search-chickens">Search</button>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Number of chickens	</th>
                                        <th>Farmer</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($chicken as $chickens)
                                        <tr>
                                            <td>{{$chickens->id}}</td>
                                            <td>{{$chickens->date}}</td>
                                            <td>{{$chickens->number}}</td>
                                            <td>{{ $chickens->farmerName }}</td>
                                            <td>{{$chickens->farmerPhone}}</td>
                                            <td><span class="badge bg-danger">{{$chickens->status}}</span></td>
                                        </tr>
                                    @endforeach
                                    <!-- Add more chicken records as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Eggs Records</h4>
                            <div class="table-responsive">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Eggs" aria-label="Search Eggs" aria-describedby="search-eggs">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" id="search-eggs">Search</button>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Number of Eggs</th>
                                        <th>Farmer</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($eggsRecord as $chickens)
                                        <tr>
                                            <td>{{$chickens->id}}</td>
                                            <td>{{$chickens->date}}</td>
                                            <td>{{$chickens->eggs_number}}</td>
                                            <td>{{ $chickens->farmerName }}</td>
                                            <td>{{$chickens->farmerPhone}}</td>
                                            <td><span class="badge bg-danger">{{$chickens->status}}</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize DataTables for both tables
            var chickensTable = $('.zero-configuration').DataTable({
                "order": [], // Disable initial sorting
                "searching": true, // Enable search functionality
                "responsive": true // Enable responsive mode
            });

            var eggsTable = $('.zero-configuration').DataTable({
                "order": [], // Disable initial sorting
                "searching": true, // Enable search functionality
                "responsive": true // Enable responsive mode
            });

            // Search functionality
            $('#search-chickens').on('click', function() {
                var searchTerm = $('.form-control').val();
                chickensTable.search(searchTerm).draw();
            });

            $('#search-eggs').on('click', function() {
                var searchTerm = $('.form-control').val();
                eggsTable.search(searchTerm).draw();
            });
        });
    </script>
@endpush
