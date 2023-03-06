<div class="modal fade col-xs-12" id="--newmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Επέλεξε εισαγωγή παρακάτω!</h4>
      </div>
      <div class="modal-body">

        <div class="col-xs-4">
          <div class="divider"></div>
          <h4 class="text-center">Κατάστημα</h4>
          <a href="{{ route('company.create')}}" title="Markets">
            <img src="{{asset('images/market.png')}}" class="img-responsive" alt="Community Markets">
          </a>
        </div>

        <div class="col-xs-4">
          <div class="divider"></div>
          <h4 class="text-center">Προϊόν</h4>
          <a href="{{ route('product.create')}}" title="Products">
            <img src="{{asset('images/products.png')}}" class="img-responsive" alt="Community Products">
          </a>
        </div>

        <div class="col-xs-4">
          <div class="divider"></div>
          <h4 class="text-center">Σύλλογος</h4>
          <a href="{{ route('group.create')}}" title="Groups">
            <img src="{{asset('images/groups.png')}}" class="img-responsive" alt="Community Groups">
          </a>
        </div>

        <div class="col-xs-12 col-xs-offset-2">
          <br>
          <div class="col-xs-4">
            <div class="divider"></div>
            <h4 class="text-center">Εκδήλωση</h4>
            <a href="{{ route('events.create')}}" title="Events">
              <img src="{{asset('images/event.png')}}" class="img-responsive" alt="Community Events">
            </a>
          </div>

          <div class="col-xs-4">
            <div class="divider"></div>
            <h4 class="text-center">Είδηση</h4>
            <a href="{{ route('posts.create')}}" title="Blogger">
              <img src="{{asset('images/blogger.png')}}" class="img-responsive" alt="Community Blogger">
            </a>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        {{--
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>--}}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
