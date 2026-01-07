@extends("backend.layouts.master")
@section("head")

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/assets/images/favicon.png">
    <title>AdminBite admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{url('')}}/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="{{url('')}}/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="{{url('')}}/assets/libs/morris.js/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('')}}/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{url('')}}/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="{{url('')}}/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
@endsection

@section("content")

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if($errors->any())
           
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
             
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category Entry From</h4>
                        <div class="repeater-default m-t-30">
                            <div data-repeater-list="">
                                <div data-repeater-item="">
                                    
                                    <form method="post" action="{{route('category.store')}}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="name">Category Name</label>
                                                <input type="text" class="form-control" id="name" name="cat_name" value="{{old('cat_name')}}" placeholder="Category Name">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-success waves-effect waves-light" type="submit">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @endsection
    @section("script")
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('')}}/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('')}}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{url('')}}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="{{url('')}}/dist/js/app.min.js"></script>
    <script src="{{url('')}}/dist/js/app.init.js"></script>
    <script src="{{url('')}}/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('')}}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{url('')}}/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{url('')}}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{url('')}}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{url('')}}/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{url('')}}/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{url('')}}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="{{url('')}}/assets/extra-libs/c3/d3.min.js"></script>
    <script src="{{url('')}}/assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="{{url('')}}/assets/libs/raphael/raphael.min.js"></script>
    <script src="{{url('')}}/assets/libs/morris.js/morris.min.js"></script>

    <script src="{{url('')}}/dist/js/pages/dashboards/dashboard1.js"></script>

    @endsection