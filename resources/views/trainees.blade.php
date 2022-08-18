{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('gender', 'Gender:') !!}
			{!! Form::text('gender') !!}
		</li>
		<li>
			{!! Form::label('height', 'Height:') !!}
			{!! Form::text('height') !!}
		</li>
		<li>
			{!! Form::label('weight', 'Weight:') !!}
			{!! Form::text('weight') !!}
		</li>
		<li>
			{!! Form::label('level', 'Level:') !!}
			{!! Form::text('level') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}