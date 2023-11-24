@if (auth()->user()->currentMembership && auth()->user()->currentMembership->end_date > now())

@role('Company/Products Owner')
<li>
    <a href="{{ route('owner.companies.index') }}"><i class="fas fa-shopping-bag"></i> <span>Company List</span></a>
</li>
<li>
    <a href="{{ route('owner.companies.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Company</span></a>
</li>
<li>
    <a href="{{ route('owner.fields.index') }}"><i class="fas fa-shopping-bag"></i> <span>Fields List</span></a>
</li>
<li>
    <a href="{{ route('owner.fields.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create fields</span></a>
</li>

<li>
    <a href="{{ route('owner.products.index') }}"><i class="fas fa-shopping-bag"></i> <span>Products List</span></a>
</li>
<li>
    <a href="{{ route('owner.products.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Product</span></a>
</li>

<li>
    <a href="{{ route('owner.attributes.index') }}"><i class="fas fa-shopping-bag"></i> <span>Attributes List</span></a>
</li>
<li>
    <a href="{{ route('owner.attributes.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Attribute</span></a>
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

<li><a href="{{ route('owner.amenities.index') }}"><i class="fas fa-shopping-bag"></i> <span>Amenities List</span></a></li>
<li><a href="{{ route('owner.amenities.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create amenity</span></a>
</li>

@role('Venue/Events Owner')

<li><a href="{{ route('owner.venues.index') }}"><i class="fas fa-shopping-bag"></i> <span>Venue List</span></a></li>
<li><a href="{{ route('owner.venues.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Venue</span></a>

<li><a href="{{ route('owner.events.index') }}"><i class="fas fa-shopping-bag"></i> <span>Event List</span></a></li>
<li><a href="{{ route('owner.events.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Event</span></a>

@endrole

@role('Group/Events Owner')

<li><a href="{{ route('owner.groups.index') }}"><i class="fas fa-shopping-bag"></i> <span>Club List</span></a></li>
<li><a href="{{ route('owner.groups.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Club</span></a>

<li><a href="{{ route('owner.clubevents.index') }}"><i class="fas fa-shopping-bag"></i> <span>Event List</span></a></li>
<li><a href="{{ route('owner.clubevents.create') }}"><i class="fas fa-shopping-bag"></i> <span>Create Event</span></a>

@endrole

@endif
