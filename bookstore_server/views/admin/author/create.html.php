{% extends admin/master.html.php %}

{% block title %}
NTH Book Store - Admin - Thêm tác giả
{% endblock %}

{% block header %}
Quản lý tác giả
{% endblock %}

{% block content %}
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Thêm tác giả</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/admin/author/create" method="post" enctype="multipart/form-data">
                <div class="card-body"> 
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên tác giả</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="Nhập tên tác giả" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mota" class="col-sm-2 col-form-label">Mô tả</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="mota" class="form-control" rows="3" placeholder="Nhập mô tả ..."></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Hình ảnh</label>
                            <div class="col-sm-8">
                                <input type="text" name="image_name" id="name" class="form-control" disabled>
                            </div>
                            <div class="col-sm-2">
                                <label class="border rounded p-2 bg-info text-white" for="file_upload">Chọn ảnh</label>
                                <input class="" accept="image/*" hidden name="file_upload" id="file_upload" type="file"  onchange="hienthianh(this); ">
                            </div>
                    </div>
                    <div class="text-center mb-1"><img id="image" src="" alt="" name="image_path"></div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                    <a href="/admin/author" class="btn btn-secondary float-right">Quay về</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>
{% endblock %}

{% block custom_scrips %}
<script>
    function hienthianh(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            const name = document.getElementById('name');
            name.setAttribute('value', input.files[0].name);

            reader.onload = function(e) {
                const image = document.getElementById('image');
                image.setAttribute('src', e.target.result);
                image.setAttribute('height', 200);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
{% endblock %}


