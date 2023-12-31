<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico"> --}}

    <title>CRM - Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('theme_admin/css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin - {{ Auth::user()->name ?? '[N\A]' }}</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('get_admin.logout') }}">Đăng xuất</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        @foreach (config('nav') as $item)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route($item['route']) }}" title="{{ $item['name'] }}">
                                    <span data-feather="{{ $item['icon'] }}"></span>
                                    {{ $item['name'] }}
                                </a>
                            </li>
                        @endforeach

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Products
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Thành viên
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Reports
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Danh mục
                            </a>
                        </li> --}}
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>----- Khác -----</span>

                    </h6>
                    {{-- <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Year-end sale
                            </a>
                        </li>
                    </ul> --}}
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                {{-- <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary">Share</button>
                            <button class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div> --}}

                {{-- <canvas class="my-4" id="myChart" width="900" height="380"></canvas> --}}

                @yield('content')

            </main>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{ asset('theme_admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme_admin/js/bootstrap.min.js') }}"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    {{-- <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script> --}}
    <script>
        feather.replace();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            $("#loadDistrict").change(function() {
                console.log("------LOAD----------");
                let province_id = $(this).find(":selected").val();
                console.log("------province_id: ", province_id);

                $.ajax({

                        url: "/admin/location/district",
                        data: {

                            province_id: province_id
                        },
                        beforeSend: function(xhr) {
                            // xhr.overrideMimeType("text/plain; charset=x-user-defined");
                        }
                    })
                    .done(function(data) {
                        console.log("------Data: ", data);

                        let dataOptions = `<option value="">---Chọn quận huyện---</option>`;
                        data.map(function(index, key) {
                            dataOptions += `<option value=${index.id}>${index.name}</option>`
                        });
                        $("#districtsData").html(dataOptions);
                    });
            });

            $("#districtsData").change(function() {

                let district_id = $(this).find(":selected").val();

                $.ajax({

                        url: "/admin/location/ward",
                        data: {

                            district_id: district_id
                        },
                        beforeSend: function(xhr) {
                            // xhr.overrideMimeType("text/plain; charset=x-user-defined");
                        }
                    })
                    .done(function(data) {
                        console.log("------Data: ", data);

                        let dataOptions = `<option value="">---Chọn phường xã---</option>`;
                        data.map(function(index, key) {
                            dataOptions += `<option value=${index.id}>${index.name}</option>`
                        });
                        $("#wardData").html(dataOptions);
                    });
            });
        })
    </script>
    
</body>

</html>
