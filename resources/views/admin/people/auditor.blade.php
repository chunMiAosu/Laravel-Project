<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>审核员</title>
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">审核员</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 100px">id</th>
                                        <th style="width: 500px">昵称</th>
                                        <th>邮箱</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->email}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>

            </div>
        </section>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(function() {
        let tmp = document.getElementById("people").className;
        document.getElementById("people").setAttribute("class", tmp + " menu-open");
        tmp = document.getElementById("people_auditor").className;
        document.getElementById("people_auditor").setAttribute("class",tmp+" active");
    });
</script>

</body>
</html>
