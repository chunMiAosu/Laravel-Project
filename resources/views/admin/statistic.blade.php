<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>情况统计</title>
    @include('admin.public.styles')
    @include('admin.public.script')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('admin.public.header')
        <!-- Main Sidebar Container -->
        @include('admin.public.aside')
    </div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- Small Box (Stat card) -->
                <h5 class="mb-2 mt-4">首页的文章</h5>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                @foreach($all_type as $t)
                                    @if($t->type == "时政")
                                        <h3>{{$num[$t->id]}}</h3>
                                    @endif
                                @endforeach
                                <p>时政</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="/admin/article?type=politics" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                @foreach($all_type as $t)
                                    @if($t->type == "财经")
                                        <h3>{{$num[$t->id]}}</h3>
                                    @endif
                                @endforeach

                                <p>财经</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/admin/article?type=finance" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                @foreach($all_type as $t)
                                    @if($t->type == "军事")
                                        <h3>{{$num[$t->id]}}</h3>
                                    @endif
                                @endforeach

                                <p>军事</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <a href="/admin/article?type=military" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                @foreach($all_type as $t)
                                    @if($t->type == "教育")
                                        <h3>{{$num[$t->id]}}</h3>
                                    @endif
                                @endforeach

                                <p>教育</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <a href="/admin/article?type=education" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                @foreach($all_type as $t)
                                    @if($t->type == "体育")
                                        <h3>{{$num[$t->id]}}</h3>
                                    @endif
                                @endforeach

                                <p>体育</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="/admin/article?type=sports" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>
</html>
