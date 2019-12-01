@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Event : {{$event->title}}
      @can ('update_events', App\Event::class)
        <small><a class="btn btn-primary" href="{{route('events.edit', $event->id)}}">Edit</a> - <a class="btn btn-warning" href="javascript:history.back()">Go Back</a></small>
      @endcan
    </h1>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">
          <div class="form-group">
            <label for="title">Ονομασία Εκδήλωσης - Διοργανωτή</label>
            <div class="input-group">
              <input type="text" value="{{ $event->title }}" class="form-control" name="title" id="title" placeholder="Enter Name" disabled>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-home"></span>
              </span>
            </div>
          </div>

          <div class="form-group">
            <label for="meta_description">Meta Decription</label>
            <input type="text" value="{{$event->meta_description}}" class="form-control" id="meta_description" placeholder="meta_description" disabled>
          </div>

          <div class="form-group">
            <label for="meta_keywords">Meta Keywords</label>
            <input type="text" value="{{$event->meta_keywords}}" class="form-control" id="meta_keywords" placeholder="meta_keywords" disabled>
          </div>

          <div class="row">
            <div class="col-xs-2 form-group">
              <label for="active"> Active
                <input type="checkbox" name="active" value="1" @if ($event->active == 1)
                  {{'checked'}}
                @endif>
              </label>
            </div>
            <div class="col-xs-5 form-group">
              <label for="price">Τιμή Εισόδου</label>
              <div class="input-group">
                <input type="text" placeholder="{{ $event->entrance }}" class="form-control" id="entrance" name="entrance">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-euro"></span>
                </span>
              </div>
            </div>
            <div class="col-xs-5 form-group">
              <label for="telephone">Τηλέφωνο</label>
              <div class="input-group">
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="{{ $event->telephone }}" disabled>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-earphone"></span>
                </span>
              </div>
            </div>
          </div>

        <div class="row">
          <div class="col-xs-3 form-group">
            <label for="start_date">Ημερομηνία Έναρξης</label>
            <div class="input-group">
              <input type="date" value="{{ $event->start_date }}" class="form-control" id="start_date" name="start_date">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="start_time">Ώρα Έναρξης</label>
              <div class="input-group">
                <input type="time" value="{{ $event->start_time }}" class="form-control" id="start_time" name="start_time">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-xs-3 form-group">
            <label for="start_date">Ημερομηνία Λήξης</label>
            <div class="input-group">
              <input type="date" value="{{ $event->end_date }}" class="form-control" id="end_date" name="end_date">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="end_time">Ώρα Λήξης</label>
              <div class="input-group">
                <input type="time" value="{{ $event->end_time }}" class="form-control" id="end_time" name="end_time" disabled>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="header">Header</label>
          <div class="input-group">
            <img width="100%" height="200px" src="{{ asset('images/events/'.$event->header) }}" alt="{{ $event->title }}">
          </div>
        </div>

        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <label for="logo">Λογότυπο</label>
              <div class="input-group">
                <img width="100%" height="200px" src="{{ asset('images/events/'.$event->logo) }}" alt="{{ $event->title }}">
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="image1">Εικόνα Αρχικης</label>
              <div class="input-group">
                <img width="100%" height="200px" src="{{ asset('images/events/'.$event->image1) }}" alt="{{ $event->title }}">
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="image2">Εικόνα Λίστας Συλλόγων</label>
              <div class="input-group">
                <img width="100%" height="200px" src="{{ asset('images/events/'.$event->image2)}}" alt="{{ $event->title }}">
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="image3">Εικόνες Σελίδας Συλλόγου</label>
              <div class="input-group">
                <img width="100%" height="200px" src="{{ asset('images/events/'.$event->image3) }}" alt="{{ $event->title }}">
              </div>
            </div>
          </div>
        </div>

        <div class="row">

            <div class="col-xs-6">
              <div class="form-group">
                <label for="website">Ιστοσελίδα</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="website" name="website" placeholder="{{ $event->website }}">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-globe"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="email">E-Mail</label>
                <div class="input-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="{{ $event->email }}">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="facebook">Facebook</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="facebook" name="facebook" placeholder="{{$event->facebook }}">
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
                  <input type="text" class="form-control" id="twitter" name="twitter" placeholder="{{ $event->twitter }}">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-heart"></span>
                  </span>
                </div>
              </div>
            </div>

        </div><!--row-->

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="description">Περιγραφή</label>
              <div class="input-group">
                <textarea name="description" placeholder="Description" id="description" class="form-control" rows="5" required>{{ $event->description }}</textarea>
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
