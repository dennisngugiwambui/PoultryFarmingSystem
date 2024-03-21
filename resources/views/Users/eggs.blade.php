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
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addChickenModal">
                                            <i class="fa fa-plus"></i> Add Eggs
                                        </button>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Number of Chickens</th>
                                        <th>Farmer</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($eggsCount as $chickens)
                                        <tr>
                                            <td>{{$chickens->id}}</td>
                                            <td>{{$chickens->date}}</td>
                                            <td>{{$chickens->eggs_number}}</td>
                                            <td>{{ $chickens->farmerName }}</td>
                                            <td>{{$chickens->farmerPhone}}</td>
                                            <td><span class="badge badge-pill badge-danger">{{$chickens->status}}</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Chicken Modal -->
            <div class="modal fade" id="addChickenModal" tabindex="-1" role="dialog" aria-labelledby="addChickenModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addChickenModalLabel">Add Eggs</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('RegisterEggs')}}" method="post">
                                @csrf
                                <!-- Add your form fields here -->
                                <div class="mb-3">
                                    <label for="eggs_number" class="form-label">Number of Eggs</label>
                                    <input type="number" class="form-control" id="eggs_number" name="eggs_number" required>
                                </div>
                                <div class="mb-3">
                                    <label for="comments" class="form-label">Comments</label>
                                    <textarea class="form-control" id="comments" name="comments" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
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
