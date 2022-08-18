{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('trainee_id', 'Trainee_id:') !!}
			{!! Form::text('trainee_id') !!}
		</li>
		<li>
			{!! Form::label('ill_id', 'Ill_id:') !!}
			{!! Form::text('ill_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}