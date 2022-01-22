{% extends admin/master.html.php %}

{% block title %}
NTH Book Store - Admin - Thể loại
{% endblock %}

{% block header %}
Quản lý thể loại
{% endblock %}

{% block content %}
<div class="card">
    <div class="card-header">
        
                <h3 class="card-title">Danh sách thể loại</h3>
            
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-success" href="/admin/category/create">Thêm mới</a>
            </div>
        
        
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-10">
                    <div class="dt-buttons btn-group flex-wrap">
                        <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                aria-controls="example1" type="button"><span>Copy</span></button>
                        <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
                                aria-controls="example1" type="button"><span>CSV</span></button>
                        <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                aria-controls="example1" type="button"><span>Excel</span></button>
                        <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                aria-controls="example1" type="button"><span>PDF</span></button>
                        <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1"
                                type="button"><span>Print</span></button>
                        <div class="btn-group">
                            <button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                                    tabindex="0" aria-controls="example1" type="button" aria-haspopup="true"
                                    aria-expanded="false"><span>Column visibility</span></button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                                                                             class="form-control form-control-sm"
                                                                                             placeholder=""
                                                                                             aria-controls="example1"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending">#
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending">Tên thể loại
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Mô tả
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending">Hành động
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;
                        foreach ($category_all as $item):?>
                        <tr class="even">
                            <td class="dtr-control sorting_1" tabindex="0"><?=$count++?></td>
                            <td><?=$item->name?></td>
                            <td><?=$item->description?></td>
                            <td>
                                <a style="color: hotpink" href="/admin/category/edit?id=<?=$item->id?>"><i class="far fa-edit"></i></a>
                                <a style="color: darkturquoise" href="/admin/category/delete?id=<?=$item->id?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                   <?php endforeach;?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">#</th>
                            <th rowspan="1" colspan="1">Tên thể loại</th>
                            <th rowspan="1" colspan="1">Mô tả</th>
                            <th rowspan="1" colspan="1">Hành động</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 11 to 20 of
                        57 entries
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous" id="example1_previous"><a href="#"
                                                                                                     aria-controls="example1"
                                                                                                     data-dt-idx="0"
                                                                                                     tabindex="0"
                                                                                                     class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="1"
                                                                      tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="example1"
                                                                            data-dt-idx="2" tabindex="0"
                                                                            class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3"
                                                                      tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4"
                                                                      tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5"
                                                                      tabindex="0" class="page-link">5</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6"
                                                                      tabindex="0" class="page-link">6</a></li>
                            <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                                                                             aria-controls="example1"
                                                                                             data-dt-idx="7"
                                                                                             tabindex="0"
                                                                                             class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
{% endblock %}
