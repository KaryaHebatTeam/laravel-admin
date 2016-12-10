<ul>
	@foreach($menular as $level1)
	@if ($level1->level == "1")
	<li>
		<a href="#">{{ $level1->name }}</a>
		<ul>
			@foreach($menular as $level2)
			@if ($level2->level == "2" AND $level2->parent_id == $level1->id)
			<li><a href="#">{{ $level2->name }}</a></li>
			@endif
			@endforeach
		</ul>
	</li>
	@endif
	@endforeach
</ul>