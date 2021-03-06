@extends('admin.layout')

@section('title')
Edit {{$category->name}}
@endsection

@section('desc')
Made a mistake? No Prob-Lamo
@endsection

@section('content')

<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editing {{$category->name}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.Categories.edit',["category"=>$category])}}" method="POST">
            	{{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input class="form-control" name="name" id="name" placeholder="Category Name" value="{{$category->name}}" required>
                </div>

                <div class="form-group">
                  <label for="desc">Description</label>
                    <textarea id="desc" name="desc" rows="10" cols="80" style="visibility: hidden; display: none;" value="{{$category->desc}}"> 
                    	{{$category->desc}}
                    </textarea>
                </div>


				
				<div class="form-group">
                  <label for="short_desc">Short Description</label>
                  <input class="form-control" name="short_desc" id="short_desc" placeholder="Short category description" value="{{$category->short_desc}}" required>
                </div>

				<div class="form-group">
                  <label for="visible">Visible</label>
                  <input type="checkbox" id="visible" value="1" @if($category->visible == 1) checked="" @endif name="visible"> 
                </div>
                <div class="form-group">
                  <label for="featured">Featured</label>
                   <input type="checkbox" id="featured" value="1" @if($category->featured == 1) checked="" @endif name="featured"> 
                </div>
                 <div class="form-group">
                	<label for="parent">Parent Category</label>
                	<br>
                	<select class="parent" id="parent" name="parent">
						        <option value="">None</option>
        				@foreach(\App\Category::all() as $category2)
        					@if($category2->parent_id == null)
        						<option value="{{$category2->id}}" @if($category->parent_id == $category2->id) selected @endif>{{$category2->name}}</option>
        					@endif
                       @endforeach
					</select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              		<button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
@endsection

@section('head')
  <link rel="stylesheet" href="/admin/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="/admin/bower_components/select2/dist/css/select2.min.css">
    <style type="text/css">
    	.select2-container {
  margin: 0;
}
    </style>
@endsection

@section('extra')
	<script src="/admin/plugins/iCheck/icheck.min.js"></script>
	<script src="/admin/bower_components/ckeditor/ckeditor.js"></script>
	<script src="/admin/bower_components/select2/dist/js/select2.full.min.js"></script>

<script type="text/javascript">
	
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('desc');
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });

    $('.parent').select2();
  })


</script>
@endsection