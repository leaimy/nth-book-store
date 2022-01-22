{% extends admin/master.html.php %}

{% block title %}
NTH Book Store - Admin - Cập nhật thể loại
{% endblock %}

{% block header %}
Quản lý thể loại
{% endblock %}

{% block content %}
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Cập nhật thể loại</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/admin/category/edit" method="post">
                <div class="card-body">
                    <input name="id" type="text" value="<?=$category->id ?>" hidden>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên thể loại</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="Nhập tên thể loại" autocomplete="off" value="<?=$category->name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mota" class="col-sm-2 col-form-label">Mô tả</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="mota" class="form-control" rows="3" placeholder="Nhập mô tả ..."><?=$category->description ?></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                    <a href="/admin/category" class="btn btn-secondary float-right">Quay về</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>

{% endblock %}
