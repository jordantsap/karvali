@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Group
      <small>{{$group->title}}</small>
      <a class="btn btn-warning" href="javascript:history.back()">Go Back</a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form action="{{ route('teams.update',[$group->id]) }}" method="post" role="form"
        enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT"> {{ csrf_field() }}
        <div class="box-body">
        <div class="row">
          <div class="col-xs-9">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title">Ονομασία Συλλόγου</label>
              @if ($errors->has('title'))
              <strong class="text-danger">{{ $errors->first('title') }}</strong>                @endif
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
            <div class="form-group{{ $errors->has('group_type') ? ' has-error' : '' }}">
              <label for="group_type">Κατηγορία Συλλόγου</label>
              @if ($errors->has('group_type'))
              <strong class="text-danger">{{ $errors->first('group_type') }}</strong>                @endif
              <div class="input-group">
                <select name="group_type" value="{{ $group->group_type }}" id="group_type" class="form-control"
                  required>
                  <option value="">Επιλέξτε Τύπο</option>
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if( $group->group_type == $category->id){{'selected'}}
                    @else None
                    @endif>{{$category->name}}</option>
                  @endforeach
                </select>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-list"></span>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
          <label for="meta_description">Meta Description</label>
          @if ($errors->has('meta_description'))
          <strong class="text-danger">{{ $errors->first('meta_description') }}</strong>                @endif
          <div class="input-group">
            <input type="text" value="{{ $group->meta_description }}" class="form-control" name="meta_description"
              id="meta_description" placeholder="meta_description" required>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-home"></span>
            </span>
          </div>
        </div>

        <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
          <label for="meta_keywords">Meta Keywords</label>
          @if ($errors->has('meta_keywords'))
          <strong class="text-danger">{{ $errors->first('meta_keywords') }}</strong>                @endif
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
            <div class="form-group{{ $errors->has('manager') ? ' has-error' : '' }}">
              <label for="manager">Όνομα Υπευθύνου</label>
              @if ($errors->has('manager'))
              <strong class="text-danger">{{ $errors->first('manager') }}</strong>                @endif
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
            <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
              <label for="telephone">Τηλέφωνο</label>
              @if ($errors->has('telephone'))
              <strong class="text-danger">{{ $errors->first('telephone') }}</strong>                @endif
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

        <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
          <label for="header">header</label>
          @if ($errors->has('header'))
          <strong class="text-danger">{{ $errors->first('header') }}</strong>                @endif
          <div class="input-group">
            <input type="file" value="{{ $group->header }}" name="header">
            <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
              <label for="logo">Λογότυπο</label>
              @if ($errors->has('logo'))
              <strong class="text-danger">{{ $errors->first('logo') }}</strong>                @endif
              <div class="input-group">
                <input type="file" value="{{ $group->logo }}" name="logo">
                <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.</p>
              </div>
            </div>
          </div>
          <div class="form-group{{ $errors->has('image1') ? ' has-error' : '' }}">
          <div class="col-xs-3">
              <label for="image1">Εικόνα Αρχικης</label>
              @if ($errors->has('image1'))
              <strong class="text-danger">{{ $errors->first('image1') }}</strong>                @endif
              <div class="input-group">
                <input type="file" value="{{ $group->image1 }}" name="image1">
                <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.</p>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
              <label for="image2">Εικόνα Λίστας Συλλόγων</label>
              @if ($errors->has('image2'))
              <strong class="text-danger">{{ $errors->first('image2') }}</strong>                @endif
              <div class="input-group">
                <input type="file" value="{{ $group->image2 }}" name="image2">
                <p class="help-block">Επιτρέπονται όλα τα είδη εικόνων.</p>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
              <label for="image3">Εικόνες Σελίδας Συλλόγου</label>
              @if ($errors->has('image3'))
              <strong class="text-danger">{{ $errors->first('image3') }}</strong>                @endif
              <div class="input-group">
                <input type="file" value="{{ $group->image3 }}" name="image3" multiple>
                <p class="help-block">Επιτρέπονται εικόνες όλων των τύπων.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email">E-Mail</label>
              @if ($errors->has('email'))
              <strong class="text-danger">{{ $errors->first('email') }}</strong>                @endif
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
            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
              <label for="website">Ιστοσελίδα</label>
              @if ($errors->has('website'))
              <strong class="text-danger">{{ $errors->first('website') }}</strong>                @endif
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
            <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
              <label for="facebook">Facebook</label>
              @if ($errors->has('facebook'))
              <strong class="text-danger">{{ $errors->first('facebook') }}</strong>                @endif
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
            <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
              <label for="twitter">Twitter</label>
              @if ($errors->has('twitter'))
              <strong class="text-danger">{{ $errors->first('twitter') }}</strong>                @endif
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
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
              <label for="description">Περιγραφή</label>
              @if ($errors->has('description'))
              <strong class="text-danger">{{ $errors->first('description') }}</strong>                @endif
              <div class="input-group">
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ $group->description }}</textarea>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-info-sign"></span>
                </span>
              </div>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <div class="col-xs-6">
            <a class="btn btn-default btn-block" href="javascript:history.back()">Go Back</a>
          </div>
        </div>

    </div>
    </form>
  </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
