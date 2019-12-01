@role('Company-Manager')
  <li><a href="{{ route('company.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Company</span></a></li>
@endrole
@role('Group-Manager')
  <li><a href="{{ route('group.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Group</span></a></li>
@endrole
@role('Product-Manager')
  <li><a href="{{ route('product.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Product</span></a></li>
@endrole
@role('Event-Manager')
  <li><a href="{{ route('events.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Event</span></a></li>
@endrole
