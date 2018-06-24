<table class="table {{ $class }}" id="table">
	<thead>
		<tr>
			<th class="text-center">ID</th>
			<th class="text-center">Name</th>
			<th class="text-center">Hotkey</th>
			<th class="text-center">Subhotkey</th>
			<th class="text-center">Address</th>
			<th class="text-center">Phone</th>
			<th class="text-center">Actions</th>
		</tr>
	</thead>
	 @foreach($restaurants as $restaurant)
	<tr class="restaurant{{$restaurant->id}}">
						<td class="name">{{$restaurant->id}}</td>
						<td class="name">{{$restaurant->name}}</td>
						<td class="hotkey">{{$restaurant->hotkey}}</td>
						<td class="subhotkey">{{$restaurant->subhotkey}}</td>
						<td class="address">{{$restaurant->address}}</td>
						<td class="phone">{{$restaurant->phone}}</td>
						<td>
							<button class="edit-modal btn btn-info" value="{{$restaurant->id}},{{$restaurant->name}}, {{$restaurant->hotkey}},{{$restaurant->subhotkey}},{{$restaurant->address}}, {{$restaurant->phone}}">
								<span class="glyphicon glyphicon-edit"></span> Edit
							</button>
							<button class="delete-modal btn btn-danger" value="{{$restaurant->id}},{{$restaurant->name}}">
								<span class="glyphicon glyphicon-trash"></span> Delete
							</button>
						</td>
					</tr>
					@endforeach
		</table>
		