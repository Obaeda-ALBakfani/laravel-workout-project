{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('exe_id', 'Exe_id:') !!}
			{!! Form::text('exe_id') !!}
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