<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>审核员-审核结果</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('admin.public.styles')
    @include('admin.public.script')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
@include('admin.public.header')
@include('admin.public.aside')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-five-politics-tab" data-toggle="pill" href="#custom-tabs-five-politics" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">时政</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-five-finance-tab" data-toggle="pill" href="#custom-tabs-five-finance" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">财经</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-five-military-tab" data-toggle="pill" href="#custom-tabs-five-military" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">军事</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-five-education-tab" data-toggle="pill" href="#custom-tabs-five-education" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">教育</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-five-sports-tab" data-toggle="pill" href="#custom-tabs-five-sports" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">体育</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">

                                    <div class="tab-pane fade show active" id="custom-tabs-five-politics" role="tabpanel" aria-labelledby="custom-tabs-five-politics-tab">
                                        @foreach($data as $d)
                                            @if($d->type == "时政")
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card card-primary card-outline">
                                                            <div class="card-header">
                                                                <h3 class="card-title">{{$d->topic}}</h3>

                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                                <!-- /.card-tools -->
                                                            </div>
                                                            <div class="card-body" style="display: block;">
                                                                <h5 class="card-title">-{{$d->author}}</h5>
                                                                <p class="card-text">
                                                                    {{$d->content}}
                                                                </p>
                                                            </div>
                                                        </div><!-- /.card -->
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-five-finance" role="tabpanel" aria-labelledby="custom-tabs-five-finance-tab">
                                        @foreach($data as $d)
                                            @if($d->type == "财经")
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card card-primary card-outline">
                                                            <div class="card-header">
                                                                <h3 class="card-title">{{$d->topic}}</h3>

                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                                <!-- /.card-tools -->
                                                            </div>
                                                            <div class="card-body" style="display: block;">
                                                                <h5 class="card-title">-{{$d->author}}</h5>
                                                                <p class="card-text">
                                                                    {{$d->content}}
                                                                </p>
                                                            </div>
                                                        </div><!-- /.card -->
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-five-military" role="tabpanel" aria-labelledby="custom-tabs-five-military-tab">
                                        @foreach($data as $d)
                                            @if($d->type == "军事")
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card card-primary card-outline">
                                                            <div class="card-header">
                                                                <h3 class="card-title">{{$d->topic}}</h3>

                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                                <!-- /.card-tools -->
                                                            </div>
                                                            <div class="card-body" style="display: block;">
                                                                <h5 class="card-title">-{{$d->author}}</h5>
                                                                <p class="card-text">
                                                                    {{$d->content}}
                                                                </p>
                                                            </div>
                                                        </div><!-- /.card -->
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-five-education" role="tabpanel" aria-labelledby="custom-tabs-five-education-tab">
                                        @foreach($data as $d)
                                            @if($d->type == "教育")
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card card-primary card-outline">
                                                            <div class="card-header">
                                                                <h3 class="card-title">{{$d->topic}}</h3>

                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                                <!-- /.card-tools -->
                                                            </div>
                                                            <div class="card-body" style="display: block;">
                                                                <h5 class="card-title">-{{$d->author}}</h5>
                                                                <p class="card-text">
                                                                    {{$d->content}}
                                                                </p>
                                                            </div>
                                                        </div><!-- /.card -->
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-five-sports" role="tabpanel" aria-labelledby="custom-tabs-five-sports-tab">
                                        @foreach($data as $d)
                                            @if($d->type == "体育")
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card card-primary card-outline">
                                                            <div class="card-header">
                                                                <h3 class="card-title">{{$d->topic}}</h3>

                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                                <!-- /.card-tools -->
                                                            </div>
                                                            <div class="card-body" style="display: block;">
                                                                <h5 class="card-title">-{{$d->author}}</h5>
                                                                <p class="card-text">
                                                                    {{$d->content}}
                                                                </p>
                                                            </div>
                                                        </div><!-- /.card -->
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

</body>
</html>
