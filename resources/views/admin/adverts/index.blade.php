@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Adverts
        @can ('create_adverts', App\Advert::class)
          <small><a class="btn btn-primary" href="{{route('adverts.create')}}">New</a></small>
        @endcan
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">

                @if(!count($adverts))
                  <div class="col-xs-12 noresults">
                    <h1><b>Δεν υπάρχει τίποτα εδώ ακόμα!</b></h1>
                  </div>
                @else
                <thead>
                <tr>
                  <th>id</th>
                  <th>Active</th>
                  <th>Banner</th>
                  @can ('view_adverts','update_adverts', App\Advert::class)
                    <th>Actions</th>
                  @endcan
                </tr>
                </thead>
                @foreach ($adverts as $advert)
                  <tbody>
                  <tr>
                    <td>{{$advert->id}}</td>
                    <td>{{$advert->active?"yes":'no'}}</td>
                    <td><img width="150px" height="150px" src="{{asset('images/adverts/'.$advert->banner)}}" alt="{{$advert->title}}"></td>
                    <td>
                    @can ('update_adverts', App\Advert::class)
                      <a class="btn btn-primary" href="{{route('adverts.edit', $advert->id)}}">Edit</a> -
                    @endcan
                    @can ('view_adverts', App\Advert::class)
                      <a class="btn btn-primary" href="{{route('adverts.show', $advert->id)}}">View</a>
                      @endcan
                        @can ('delete_adverts', App\Models\Advert::class)
                            <form action="{{ route('adverts.destroy', $advert->id) }}"
                                  method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <br>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                        @endcan
                    </td>
                  </tr>
                  </tbody>
                @endforeach
              @endif
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Active</th>
                    <th>Banner</th>
                    @can ('view_adverts','update_adverts', App\Advert::class)
                      <th>Actions</th>
                    @endcan
                  </tr>
                </tfoot>
              </table>
              {{$adverts->links()}}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
