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
                                <div class="stat-text">Poultry</div>
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


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

@endsection



<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            var display = "none";  // Set the default display to "none"

            // Exclude the table head from search
            if (tr[i].getElementsByTagName("th").length > 0) {
                tr[i].style.display = "";
                continue;  // Skip to the next iteration if it's the table head
            }

            // Loop through the columns (0 to 5)
            for (var j = 0; j < 6; j++) {
                td = tr[i].getElementsByTagName("td")[j];

                if (td) {
                    txtValue = td.textContent || td.innerText;

                    // If any of the columns match the search criteria, set display to "table-row"
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        display = "table-row";
                        break;  // Break the inner loop if a match is found in any column
                    }
                }
            }

            tr[i].style.display = display;
        }
    }
</script>
