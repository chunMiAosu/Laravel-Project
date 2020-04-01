<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>时政</title>
    @include('admin.public.styles')
    @include('admin.public.script')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
    @include('admin.public.header')
    @include('admin.public.aside')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">草稿箱</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 600px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>题目</th>
                                        <th>内容</th>
                                        <th>类型</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($article as $a)
                                        <tr>
                                            <td>{{$a['topic']}}</td>
                                            <td>{{$a['content']}}</td>
                                            <td>{{$a['type']}}</td>
                                            <form action="/admin/me/editor" method="get">
                                                <input type="hidden" name="id" value="{{$a['id']}}">
                                                <td>
                                                    <input type="submit" style="float:right" class="btn btn-info" value="继续编辑">
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


</body>
</html>
