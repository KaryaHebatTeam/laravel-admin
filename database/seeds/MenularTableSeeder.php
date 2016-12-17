<?php

use Illuminate\Database\Seeder;

class MenularTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        DB::table('menulars')->insert(array(
	        array(
	        	'id'			=> 1,
	            'name' 			=> 'Dashboard',
	            'url'			=> '/admin',
	            'icon_class' 	=> 'fa fa-home',
	            'level'		 	=> '1',
	            'parent_id'		=> NULL
	        ),
	        array(
	        	'id'			=> 2,
	            'name' 			=> 'Settings',
	            'url'			=> '/admin/settings',
	            'icon_class' 	=> 'fa fa-gear',
	            'level'		 	=> '1',
	            'parent_id'		=> NULL
	        ),
	        array(
	        	'id'			=> 3,
	            'name' 			=> 'Edit Profile',
	            'url'			=> '/admin/edit-profile',
	            'icon_class' 	=> 'fa fa-user',
	            'level'		 	=> '1',
	            'parent_id'		=> NULL
	        ),
	        array(
	        	'id'			=> 4,
	            'name' 			=> 'Multilevel Menu',
	            'url'			=> '#',
	            'icon_class' 	=> 'fa fa-circle',
	            'level'		 	=> '1',
	            'parent_id'		=> NULL
	        ),
	        array(
	        	'id'			=> 5,
	            'name' 			=> 'Level 2',
	            'url'			=> '#',
	            'icon_class' 	=> 'fa fa-circle',
	            'level'		 	=> '2',
	            'parent_id'		=> 4
	        ),
	        array(
	        	'id'			=> 6,
	            'name' 			=> 'Level 3',
	            'url'			=> '#',
	            'icon_class' 	=> 'fa fa-circle',
	            'level'		 	=> '3',
	            'parent_id'		=> 5
	        )
        ));
    }
}
