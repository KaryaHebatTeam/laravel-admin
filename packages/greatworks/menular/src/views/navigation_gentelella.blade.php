<div class="menu_section">
	<ul class="nav side-menu">
	  @foreach ($menular['level1'] as $level1)
	  	@if ($level1->has_child)

		  <li><a><i class="{{ $level1->icon_class }}"></i> {{ $level1->name }} <span class="fa fa-chevron-down"></span></a>
		    <ul class="nav child_menu">

		    	@foreach($menular['level2'] as $level2)
					@if ($level2->parent_id == $level1->id)
						@if ($level2->has_child)
					        
					        <li><a><i class="{{ $level2->icon_class }}"></i> {{ $level2->name }}<span class="fa fa-chevron-down"></span></a>
					          <ul class="nav child_menu">
					          	
					          	@foreach($menular['level3'] as $level3)
									@if ($level3->parent_id == $level2->id)
						            	
						            	<li class="sub_menu">
						            		<a href="{{ $level3->url }}"><i class="{{ $level3->icon_class }}"></i>  {{ $level3->name }}</a>
						            	</li>
						            
						            @endif
								@endforeach
					          
					          </ul>
					        </li>
					    
					    @else

					    	<li class="sub_menu"><a href="{{ $level2->url }}"><i class="{{ $level2->icon_class }}"></i>  {{ $level2->name }}</a></li>
					    
					    @endif
			        @endif
				@endforeach

		    </ul>
		  </li>

		@else

			<li class="sub_menu"><a href="{{ $level1->url }}"> <i class="{{ $level1->icon_class }}"></i>{{ $level1->name }}</a></li>
		
		@endif
	  @endforeach
	</ul>
</div>