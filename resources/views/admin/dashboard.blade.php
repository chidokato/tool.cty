@extends('admin.layout.index')
@section('dashboard') menu-item-active @endsection
@section('content')
@include('admin.layout.header')
<?php use App\quanlykho; ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <!-- <h1 class="h3 mb-0 text-gray-800">List Category</h1> -->
    <form style="display: flex;" action="admin/dashboard-search" method="post"><input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="input-group">
            <select name="articles_id" class="form-control select2">
                @foreach($articles_search as $val)
                <option value="">...</option>
                <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
            </select>
        </div>
        <select style="width: 100px;" class="form-control mr-3 " name="paginate">
            <option <?php if(isset($paginate) && $paginate=='50'){echo "selected";} ?> value="50">50</option>
            <option <?php if(isset($paginate) && $paginate=='100'){echo "selected";} ?> value="100">100</option>
            <option <?php if(isset($paginate) && $paginate=='200'){echo "selected";} ?> value="200">200</option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </form>
    <!-- <a href="admin/nhaphang/add"><button class="btn-primary" type="button"><i class="far fa-file"></i> Thêm mới</button></a> -->
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Quản lý tin tức</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .table td, .table th {
        padding: .75rem;
        vertical-align: top;
        border: 1px solid #e3e6f0; text-align: center;
    }
</style>

@endsection
