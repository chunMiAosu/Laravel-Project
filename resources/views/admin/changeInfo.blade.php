<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>修改个人信息</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('admin.public.styles')
    @include('admin.public.script')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">修改个人信息</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="/doChangeInfo" method="post">
        <div class="card-body">
            <input type="text" class="form-control" placeholder="Username" required="required" name="name">
            {{csrf_field()}}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </form>
    @if(count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li><br/>
                @endforeach
            </ul>
        </div>
    @endif
</div>


</body>
</html>
