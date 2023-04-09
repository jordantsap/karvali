@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Group : {{$group->title}}
      @can ('update_groups', App\Models\Group::class)
        <small><a class="btn btn-primary" href="{{route('teams.edit', $group->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
      @endcan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
      <div class="row">
        <div class="col-xs-9">
          <div class="form-group">
            <label for="title">Ονομασία Συλλόγου</label>
            <div class="input-group">
              <input type="text" value="{{ $group->title }}" class="form-control" name="title"
                id="title" placeholder="Enter Name" required>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
            </div>
          </div>
        </div>
        <div class="col-xs-3">
          <div class="form-group">
            <label for="category">Category</label>
            <div class="form-control" name="category" id="category">
              {{-- @if( ! empty($group->category)){{ $group->category->name }}
                  @else Null
              @endif --}}
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="meta_description">Meta Description</label>
        <div class="input-group">
          <input type="text" value="{{ $group->meta_description }}" class="form-control" name="meta_description"
            id="meta_description" placeholder="meta_description" required>
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-home"></span>
          </span>
        </div>
      </div>

      <div class="form-group">
        <label for="meta_keywords">Meta Keywords</label>
        <div class="input-group">
          <input type="text" value="{{ $group->meta_keywords }}" class="form-control" name="meta_keywords"
            id="meta_keywords" placeholder="meta_keywords" required>
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-home"></span>
          </span>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-2 form-group">
          <label for="active"> Active
            <input type="checkbox" name="active" value="1" @if ($group->active == 1)
              {{'checked'}}
            @endif>
          </label>
        </div>
        <div class="col-xs-7">
          <div class="form-group">
            <label for="manager">Όνομα Υπευθύνου</label>
            <div class="input-group">
              <input type="text" value="{{ $group->manager }}" class="form-control" id="manager"
                name="manager" placeholder="Για περαιτέρω διευκρινήσεις" required>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-xs-3">
          <div class="form-group">
            <label for="telephone">Τηλέφωνο</label>
            <div class="input-group">
              <input type="text" value="{{ $group->telephone }}" class="form-control" id="telephone"
                name="telephone" placeholder="Κινητό ή Σταθερό" required>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-earphone"></span>
              </span>
            </div>
          </div>
        </div>

      </div>
      <!--2cond row-->

      <div class="form-group">
        <label for="header">header</label>
        <div class="input-group">
          <img width="100%" height="200px" src="{{ asset('images/groups/'.$group->header) }}" alt="">
        </div>
      </div>

      <div class="row">
        <div class="col-xs-3">
          <div class="form-group">
            <label for="logo">Λογότυπο</label>
            <div class="input-group">
              <img width="100%" height="200px" src="{{ asset('images/groups/'.$group->logo) }}" alt="">
            </div>
          </div>
        </div>
        <div class="col-xs-3">
          <div class="form-group">
            <label for="image1">Εικόνα Αρχικης</label>
            <div class="input-group">
              <img width="100%" height="200px" src="{{ asset('images/groups/'.$group->image1) }}" alt="">
            </div>
          </div>
        </div>
        <div class="col-xs-3">
          <div class="form-group">
            <label for="image2">Εικόνα Λίστας Συλλόγων</label>
            <div class="input-group">
              <img width="100%" height="200px" src="{{ asset('images/groups/'.$group->image2) }}" alt="">
            </div>
          </div>
        </div>
        <div class="col-xs-3">
          <div class="form-group">
            <label for="image3">Εικόνες Σελίδας Συλλόγου</label>
            <div class="input-group">
              <img width="100%" height="200px" src="{{ asset('images/groups/'.$group->image3) }}" alt="">
            </div>
          </div>
        </div>
      </div>
      <!--6-->

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="email">E-Mail</label>
            <div class="input-group">
              <input type="text" value="{{ $group->email }}" class="form-control" id="email" name="email"
                placeholder="E-Mail" required>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-envelope"></span>
              </span>
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label for="website">Ιστοσελίδα</label>
            <div class="input-group">
              <input type="text" value="{{ $group->website }}" class="form-control" id="website"
                name="website" placeholder="Website">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-globe"></span>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="facebook">Facebook</label>
            <div class="input-group">
              <input type="text" value="{{ $group->facebook }}" class="form-control" name="facebook"
                id="facebook" placeholder="Facebook url">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-thumbs-up"></span>
              </span>
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label for="twitter">Twitter</label>
            <div class="input-group">
              <input type="text" value="{{ $group->twitter }}" class="form-control" id="twitter"
                name="twitter" placeholder="Twitter url">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-heart"></span>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="form-group">
            <label for="description">Περιγραφή</label>
            <div class="input-group">
              <textarea name="description" id="description" class="form-control" rows="5" required>{{ $group->description }}</textarea>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-info-sign"></span>
              </span>
            </div>
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
