<div class="menu_section">
	<h3>Custom Menu</h3>
	<ul class="nav side-menu">
	  @foreach ($menu['level1'] as $level1)
	  	@if ($level1->has_child)

		  <li><a><i class="fa fa-sitemap"></i> {{ $level1->name }} <span class="fa fa-chevron-down"></span></a>
		    <ul class="nav child_menu">

		    	@foreach($menu['level2'] as $level2)
					@if ($level2->parent_id == $level1->id)
						@if ($level2->has_child)
					        
					        <li><a>{{ $level2->name }}<span class="fa fa-chevron-down"></span></a>
					          <ul class="nav child_menu">
					          	
					          	@foreach($menu['level3'] as $level3)
									@if ($level3->parent_id == $level2->id)
						            	
						            	<li class="sub_menu"><a href="level2.html">{{ $level3->name }}</a></li>
						            
						            @endif
								@endforeach
					          
					          </ul>
					        </li>
					    
					    @else

					    	<li class="sub_menu"><a href="#">{{ $level2->name }}</a></li>
					    
					    @endif
			        @endif
				@endforeach

		    </ul>
		  </li>

		@else

			<li class="sub_menu"><a href="#">{{ $level1->name }}</a></li>
		
		@endif
	  @endforeach
	</ul>
</div>