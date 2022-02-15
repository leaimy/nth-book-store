{% extends admin/master.html.php %}

{% block title %}
NTH Book Store - Admin - Cập nhật sách
{% endblock %}

{% block header %}
Quản lý sách
{% endblock %}

{% block content %}
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Cập nhật thông tin sách</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/admin/product/edit" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <input name="id" type="text" value="<?=$product->id ?>" hidden>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên sách</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="Nhập tên sách" autocomplete="off" value="<?=$product->name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Thể loại</label>
                        <div class="col-sm-10">
                            <select name="category_id" class="form-control">
                                <?php foreach ($category_all as $item):?>
                                    <option value="<?=$item->id?>" <?= $item->id == $product->category_id? "selected":""; ?> ><?=$item->name?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Tác giả</label>
                        <div class="col-sm-10">
                            <select name="author_id" class="form-control">
                                <?php foreach ($author_all as $author):?>
                                    <option value="<?=$author->id?>" <?= $author->id == $product->author_id? "selected":""; ?> ><?=$author->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="unit_price" class="col-sm-2 col-form-label">Giá nhập</label>
                        <div class="col-sm-10">
                            <input name="unit_price" type="number" class="form-control" id="unit_price" placeholder="Nhập giá nhập" autocomplete="off" value="<?=$product->unit_price ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sale_price" class="col-sm-2 col-form-label">Giá bán</label>
                        <div class="col-sm-10">
                            <input name="sale_price" type="number" class="form-control" id="sale_price" placeholder="Nhập giá bán" autocomplete="off" value="<?=$product->sale_price ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">Số lượng</label>
                        <div class="col-sm-10">
                            <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Nhập số lượng" autocomplete="off" value="<?=$product->quantity ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mota" class="col-sm-2 col-form-label">Mô tả</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="mota" class="form-control" rows="3" placeholder="Nhập mô tả ..."><?=$product->description ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Hình ảnh</label>
                        <div class="col-sm-8">
                            <input type="text" name="image_name" id="name" class="form-control" disabled value="<?= $product->get_media_name() == null ? 'macdinh.png' : $product->get_media_name() ?>">
                        </div>
                        <div class="col-sm-2">
                            <label class="border rounded p-2 bg-info text-white" for="file_upload">Chọn ảnh</label>
                            <input class="" accept="image/*" hidden name="file_upload" id="file_upload" type="file" onchange="hienthianh(this); ">
                        </div>
                    </div>
                    <div class="text-center mb-1"><img id="image" style="height: 200px;" src="<?= $product->get_media_path() == null ? '/uploads/macdinh.png' : $product->get_media_path() ?>" alt="" name="image_path"></div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                    <a href="/admin/product" class="btn btn-secondary float-right">Quay về</a>
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
