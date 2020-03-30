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
                                    <h3 class="card-title">教育（已发布）</h3>

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
                                            <th>ID</th>
                                            <th>题目</th>
                                            <th>作者</th>
                                            <th>审核员</th>
                                            <th>内容</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($article as $a)
                                            <tr>
                                                <td>{{$a['id']}}</td>
                                                <td>{{$a['topic']}}</td>
                                                <td>{{$a['author']}}</td>
                                                <td>{{$a['auditor']}}</td>
                                                <td>{{$a['content']}}</td>
                                                <input type="hidden" name="uid" value="{{$a['id']}}">
                                                <td><button type="button" class="btn btn-block btn-danger">删除</button> </td>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(function(){
            $(".btn").on('click',function (event) {
                let uid = $("input[name='uid']").val();
                $.ajax({
                    url : '/admin/article/delete',
                    type : 'get',
                    data : 'id='+uid,
                    dataType : 'json',
                    success : function(data){
                        if(data == 1)
                        {
                            alert("删除成功");
                            location.reload(true);
                        }
                        else
                            alert("没有权限");
                    },
                    error : function(data){
                        alert('通信失败');
                    }
                });
            })
        })
    </script>


</body>
</html>

