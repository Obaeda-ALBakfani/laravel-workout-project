{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('trainee_id', 'Trainee_id:') !!}
			{!! Form::text('trainee_id') !!}
		</li>
		<li>
			{!! Form::label('exe_id', 'Exe_id:') !!}
			{!! Form::text('exe_id') !!}
		</li>
		<li>
			{!! Form::label('extra_rep', 'Extra_rep:') !!}
			{!! Form::text('extra_rep') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}