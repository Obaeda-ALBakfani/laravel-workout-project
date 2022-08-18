{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description') !!}
		</li>
		<li>
			{!! Form::label('img', 'Img:') !!}
			{!! Form::textarea('img') !!}
		</li>
		<li>
			{!! Form::label('set', 'Set:') !!}
			{!! Form::text('set') !!}
		</li>
		<li>
			{!! Form::label('rep', 'Rep:') !!}
			{!! Form::text('rep') !!}
		</li>
		<li>
			{!! Form::label('muscle', 'Muscle:') !!}
			{!! Form::text('muscle') !!}
		</li>
		<li>
			{!! Form::label('purpose', 'Purpose:') !!}
			{!! Form::text('purpose') !!}
		</li>
		<li>
			{!! Form::label('rest_time', 'Rest_time:') !!}
			{!! Form::text('rest_time') !!}
		</li>
		<li>
			{!! Form::label('exe_time', 'Exe_time:') !!}
			{!! Form::text('exe_time') !!}
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