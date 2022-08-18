{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('Email', 'Email:') !!}
			{!! Form::text('Email') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('role', 'Role:') !!}
			{!! Form::text('role') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}