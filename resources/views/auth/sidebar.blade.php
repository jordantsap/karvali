@role('Company/Products Owner')
<li>
    <a href="{{ route('owner.company.index') }}"><i class="fas fa-shopping-bag"></i> <span>Company List</span></a>
</li>
<li>
    <a href="{{ route('owner.company.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Company</span></a>
</li>

<li>
    <a href="{{ route('owner.product.index') }}"><i class="fas fa-shopping-bag"></i> <span>Products List</span></a>
</li>
<li>
    <a href="{{ route('owner.product.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Product</span></a>
</li>

@endrole
@role('Accommodation/Rooms Owner')

<li><a href="{{ route('owner.accommodation.index') }}"><i class="fas fa-shopping-bag"></i> <span>Accommodation List</span></a></li>
<li><a href="{{ route('owner.accommodation.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Accommodation</span></a>
</li>

<li><a href="{{ route('owner.rooms.index') }}"><i class="fas fa-shopping-bag"></i> <span>Rooms List</span></a></li>
<li><a href="{{ route('owner.rooms.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Room</span></a>
</li>

<li><a href="{{ route('owner.room-types.index') }}"><i class="fas fa-shopping-bag"></i> <span>Room Types List</span></a></li>
<li><a href="{{ route('owner.room-types.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create RoomType</span></a>
</li>

@endrole
@role('Venue/Event Owner')

<li><a href="{{ route('owner.venue.index') }}"><i class="fas fa-shopping-bag"></i> <span>Venue List</span></a></li>
<li><a href="{{ route('owner.venue.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Venue</span></a>

<li><a href="{{ route('owner.event.index') }}"><i class="fas fa-shopping-bag"></i> <span>Event List</span></a></li>
<li><a href="{{ route('owner.event.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Event</span></a>
</li>

@endrole
