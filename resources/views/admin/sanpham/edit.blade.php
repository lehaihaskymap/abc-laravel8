@extends('layouts.admin')

@section('title', 'Thêm mới sản phẩm')

@section('content')

<form action="{{route('admin.sanpham.update', $sanpham->id)}}" method='post' enctype="multipart/form-data">
  @csrf @method('PUT')
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nhomsanphamid">Nhóm sản phẩm</label>
        <select class="form-control" name="nhomsanphamid" id="nhomsanphamid">
          @foreach ($nhomsanphams as $nsp )
          <option value={{$nsp->id}} @if ($sanpham->nhomsanphamid==$nsp->id) selected='selected' @endif>{{$nsp->ten}}</option>
          @endforeach

        </select>
      </div>
      <div class="form-group">
        <label for="ten">Tên</label>
        <input type="text" value="{{$sanpham->ten}}" class="form-control" name="ten" id="ten" aria-describedby="helpId"
          placeholder="Tên sản phẩm">
        @error('ten')
        <small class="text-help text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="mota">Mô tả</label>
        <textarea class="form-control" name="mota" id="mota" rows="6" placeholder='Mô tả sản phẩm' rows=8>{{$sanpham->mota}}</textarea>

      </div>
      <div class="form-group">
        <label for="danhsachanh">Danh sách ảnh</label>
        <input type="text" value="{{$sanpham->danhsachanh}}" class="form-control" name="danhsachanh" id="danhsachanh" aria-describedby="helpId"
          placeholder="Danh sách ảnh">
      </div>
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="gia">Giá</label>
        <input type="number" value="{{$sanpham->gia}}" class="form-control" name="gia" id="gia" aria-describedby="helpId" placeholder="Giá">
        @error('gia')
        <small class="text-help text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="giaban">Giá bán</label>
        <input type="number" value="{{$sanpham->giaban}}" class="form-control" name="giaban" id="giaban" aria-describedby="helpId"
          placeholder="Giá bán">
      </div>
      <div class="form-group">
        <label for="file_upload">Ảnh</label>
        @if($sanpham->anh)
            <img id="original" src="{{ url('uploads/'.$sanpham->anh) }}" height="100" width="100">
        @endif
        <input type="file" class="form-control" name="file_upload" id="file_upload" aria-describedby="helpId"
          placeholder="Ảnh sản phẩm">
      </div>
      <div class="form-group">
        <label for="trangthai">Trạng thái</label>
        <select class="form-control" name="trangthai" id="trangthai">
          <option value=1 @if ($sanpham->trangthai==1) selected='selected' @endif>Hoạt động</option>
          <option value=0 @if ($sanpham->trangthai==0) selected='selected' @endif>Không hoạt động</option>
        </select>
      </div>
      <div class="form-group">
        <label for="uutien">Mức ưu tiên</label>
        <input type="number" value="{{$sanpham->uutien}}" class="form-control" name="uutien" id="uutien" aria-describedby="helpId"
          placeholder="Mức ưu tiên">
        @error('uutien')
        <small class="text-help text-danger">{{$message}}</small>
        @enderror
      </div>

    </div>
  </div>
</form>

@endsection
