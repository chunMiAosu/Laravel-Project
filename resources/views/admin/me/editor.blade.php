<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台首页</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>开始写文章</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName" >题目</label>
                                    @if($draft_data['topic'])
                                        <input type="text" id="inputName" class="form-control" value="{{$draft_data['topic']}}">
                                    @else
                                        <input type="text" id="inputName" class="form-control">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">内容</label>
                                    @if($draft_data['content'])
                                        <textarea id="inputDescription" class="form-control" rows="6">{{$draft_data['content']}}</textarea>
                                    @else
                                        <textarea id="inputDescription" class="form-control" rows="6"></textarea>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">分类</label>
                                    <select name="type" class="form-control custom-select">

                                        @if($draft_data['type'])
                                            @foreach($article_type as $t)
                                                @if($t->type == $draft_data['type'])
                                                    <option selected >{{$t->type}}</option>
                                                @else
                                                    <option>{{$t->type}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option selected disabled>请选择</option>
                                            @foreach($article_type as $t)
                                                <option>{{$t->type}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button id="draft" type="button" class="btn btn-secondary">存到草稿箱</button>
                        <button id="submit" type="button" class="btn btn-primary" style="float:right">提交</button>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(function(){
            let tmp = document.getElementById("me").className;
            document.getElementById("me").setAttribute("class",tmp+" menu-open");
            tmp = document.getElementById("author").className;
            document.getElementById("author").setAttribute("class",tmp+" menu-open");
            document.getElementById("author_display").setAttribute("style","display:block");
            tmp = document.getElementById("author_edit").className;
            document.getElementById("author_edit").setAttribute("class",tmp+" active");


            $("#submit").on('click',function (event) {
                let topic = $("input[id='inputName']").val();
                let content = $("textarea[id='inputDescription']").val();
                let type = $("select[name='type']").val();
                let allData = {
                    'topic': topic,
                    'content': content,
                    'type' : type
                };
                $.ajax({
                    url : '/admin/me/doEditor',
                    type : 'post',
                    data : allData,
                    dataType : 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success : function(data){
                        if(data.status == 0)
                        {
                            alert(data.message);
                            window.location.href='/admin/me/editor'
                        }
                        else if(data.status == 1)
                            alert(data.message);
                    },
                    error : function(data){
                        alert('通信失败');
                    }
                });
            });
            $("#draft").on('click',function (event) {
                let topic = $("input[id='inputName']").val();
                let content = $("textarea[id='inputDescription']").val();
                let type = $("select[name='type']").val();
                let allData = {
                    'topic': topic,
                    'content': content,
                    'type' : type
                };
                $.ajax({
                    url : '/admin/me/saveDraft',
                    type : 'post',
                    data : allData,
                    dataType : 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success : function(data){
                        if(data.status == 2)
                        {
                            alert(data.message);
                            window.location.href='/admin/me/draft';
                        //    location.reload(true);
                        }
                        else if(data.status == 3)
                            alert(data.message);
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
