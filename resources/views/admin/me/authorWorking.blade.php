<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台首页</title>
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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <a href="#politics" class="btn btn-block btn-outline-info">时政</a>
                    </div>
                    <div class="col-md-2">
                        <a href="#finance" class="btn btn-block btn-outline-info">财经</a>
                    </div>
                    <div class="col-md-2">
                        <a href="#military" class="btn btn-block btn-outline-info">军事</a>
                    </div>
                    <div class="col-md-2">
                        <a href="#education" class="btn btn-block btn-outline-info">教育</a>
                    </div>
                    <div class="col-md-2">
                        <a href="#sports" class="btn btn-block btn-outline-info">体育</a>
                    </div>
                </div>

                <h4 class="mt-4 mb-2" id="politics">时政</h4>
                <div class="row">
                    @foreach($data as $d)
                        @if($d->type == "时政")
                            <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">{{$d->topic}}</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    {{$d->content}}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        @endif
                    @endforeach
                </div>

                <h4 class="mt-4 mb-2" id="finance">财经</h4>
                    <div class="row">
                        @foreach($data as $d)
                            @if($d->type == "财经")
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">{{$d->topic}}</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            {{$d->content}}
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            @endif
                        @endforeach
                </div>

                <h4 class="mt-4 mb-2" id="military">军事</h4>
                    <div class="row">
                        @foreach($data as $d)
                            @if($d->type == "军事")
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">{{$d->topic}}</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            {{$d->content}}
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            @endif
                        @endforeach
                </div>

                <h4 class="mt-4 mb-2" id="education">教育</h4>
                    <div class="row">
                        @foreach($data as $d)
                            @if($d->type == "教育")
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">{{$d->topic}}</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            {{$d->content}}
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            @endif
                        @endforeach
                    </div>

                <h4 class="mt-4 mb-2" id="sports">体育</h4>
                    <div class="row">
                        @foreach($data as $d)
                            @if($d->type == "体育")
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">{{$d->topic}}</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            {{$d->content}}
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            @endif
                        @endforeach
                    </div>

            </div>
        </section>
    </div>
</div>
<script>
    $(function() {
        let tmp = document.getElementById("me").className;
        document.getElementById("me").setAttribute("class",tmp+" menu-open");
        tmp = document.getElementById("author").className;
        document.getElementById("author").setAttribute("class",tmp+" menu-open");
        document.getElementById("author_display").setAttribute("style","display:block");
        tmp = document.getElementById("author_working").className;
        document.getElementById("author_working").setAttribute("class",tmp+" active");

        document.getElementById("author_workingNum").innerText={{count($data)}};
    });
</script>

</body>
</html>
