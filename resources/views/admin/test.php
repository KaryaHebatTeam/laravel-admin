<ul>
	@foreach($menular as $level1)
	<li>
		<a href="#">{{ $level1->name }}</a>
		@if ($level1->level_2)
		<ul>
			@foreach($level1->level_2 as $level2)
			<li>
				<a href="#">{{ $level2->name }}</a>
				@if ($level2->level_3)
				<ul>
					@foreach($level2->level_3 as $level3)
					<li><a href="#">{{ $level3->name }}</a></li>
					@endforeach
				</ul>
				@endif
			</li>
			@endforeach
		</ul>
		@endif
	</li>
	@endforeach
</ul>