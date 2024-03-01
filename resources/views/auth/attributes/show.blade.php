@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Attribute : {{$attribute->title}}
{{--      @can ('update', App\Models\Attribute::class)--}}
        <small><a class="btn btn-primary" href="{{route('admin.attributes.edit', $attribute->id)}}">Edit</a> -
            <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
{{--      @endcan--}}
    </h1>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-body">
        <div class="col-sm-6 form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="{{$attribute->title}}" value="{{$attribute->title}}" >
        </div>

        <div class="col-sm-6">

          <div class="form-group">
            <label for="productType">Κατηγορια</label>
            <div class="col-xs-12 input-group">
                <input class="form-control" type="text" placeholder="{{$attribute->productType->title}}" value="{{$attribute->productType->title}}" readonly>
            </div>
          </div>
        </div>

        <div class="col-sm-6">

          <div class="form-group">
            <label for="attribute_type">Type</label>
            <div class="col-xs-12 input-group">
                @if( ! empty($attribute->attributeType))
                <input class="form-control" type="text" placeholder="{{$attribute->attributeType->type}}" readonly>
                @else Null
                @endif
            </div>
          </div>
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
