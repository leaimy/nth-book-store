{% extends admin/master.html.php %}

{% block title %}
NTH Book Store - Admin - Thêm sách
{% endblock %}

{% block header %}
Quản lý sách
{% endblock %}

{% block content %}
<div class="row justify-content-center">
    <div class="col-7">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Thêm sách</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/admin/product/create" method="post" enctype="multipart/form-data">
                <div class="card-body"> 
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tên sách</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="Nhập tên sách" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Thể loại</label>
                        <div class="col-sm-10">
                        <select  name="category_id" class="form-control">
                            <?php foreach ($category_all as $item):?>
                            <option value="<?=$item->id?>"><?=$item->name?></option>
                            <?php endforeach; ?>
                            
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Tác giả</label>
                        <div class="col-sm-10">
                            <select name="author_id" class="form-control" id="author_id_list">
                                <?php foreach ($author_all as $author):?>
                                    <option value="<?=$author->id?>"><?=$author->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="unit_price" class="col-sm-2 col-form-label">Giá nhập</label>
                        <div class="col-sm-10">
                            <input name="unit_price" type="number" class="form-control" id="unit_price" placeholder="Nhập giá nhập" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sale_price" class="col-sm-2 col-form-label">Giá bán</label>
                        <div class="col-sm-10">
                            <input name="sale_price" type="number" class="form-control" id="sale_price" placeholder="Nhập giá bán" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">Số lượng</label>
                        <div class="col-sm-10">
                            <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Nhập số lượng" autocomplete="off">
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
                                <input class="" accept="image/*" hidden name="file_upload" id="file_upload" type="file" onchange="hienthianh(this); ">
                            </div>
                    </div>
                    <div class="text-center mb-1"><img id="image" src="" alt="" name="image_path"></div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                    <a href="/admin/product" class="btn btn-secondary float-right">Quay về</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
    <div class="col-5">
        
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Thêm thể loại</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="theloai" class="form-horizontal" action="/admin/category/create" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tên thể loại</label>
                        <div class="col-sm-8">
                            <input name="name" id="category_name" type="text" class="form-control" id="inputEmail3" placeholder="Nhập tên thể loại" autocomplete="off">
                        </div>
                    </div>
                   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button id="btn_theloai" type="submit" class="btn btn-secondary">Thêm mới</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Thêm tác giả</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="tacgia" class="form-horizontal" action="" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tên tác giả</label>
                        <div class="col-sm-8">
                            <input name="name" id="author_name" type="text" class="form-control" id="inputEmail3" placeholder="Nhập tên tác giả" autocomplete="off">
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button id="btn_tacgia" type="submit" class="btn btn-info">Thêm mới</button>
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

<script>
    var form_theloai = document.getElementById('theloai');
    var form_tacgia = document.getElementById('tacgia');
    
    var input_theloai = document.getElementById('category_name');
    var input_tacgia = document.getElementById('author_name');
    
    var btn_theloai = document.getElementById('btn_theloai');
    var btn_tacgia = document.getElementById('btn_tacgia');
    
    btn_tacgia.addEventListener('click', function (event) {
        event.preventDefault();
        var tentacgia = input_tacgia.value;
        
        // API URL 
        var api_url = '/api/v1/admin/author/store'
        
        // Method
        var method = 'POST'
        
        // Tao 1 form để chứa các dữ liệu cần gửi về server
        var form = new FormData();
        form.append('name', tentacgia);
        
        // Gửi form trên về server
        fetch(api_url, {
            method: method,
            body: form
        })
        .then(byte => byte.json())
        .then(result => {
            var id_tacgia = result.id 
            
            var authorlist = document.getElementById('author_id_list');
            
            authorlist.querySelectorAll('option').forEach(function (option) {
                option.removeAttribute('selected');
            });
            
            var new_option = `<option value="${id_tacgia}" selected>${tentacgia}</option>`;

            authorlist.insertAdjacentHTML('beforeend', new_option);
        })
        .catch(err => {
            alert(err)
        })
    })
       
</script>
{% endblock %}


