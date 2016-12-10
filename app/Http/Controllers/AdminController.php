<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * AdminController
 *
 * @author Gattigaga Hayyuta Dewa <gattigaga@gmail.com>
 * 
 */

class AdminController extends Controller
{
	/**
	 * Open a dashboard page
	 *
	 * @return string Webpage which show in the browser
	 */

	public function dashboard()
	{
		return view('admin/dashboard');
	}

	/**
	 * Open a settings page
	 *
	 * @return string Webpage which show in the browser
	 */

	public function settings()
	{
		return view('admin/settings');
	}

	/**
	 * Open a edit profile page
	 *
	 * @return string Webpage which show in the browser
	 */

	public function editProfile()
	{
		return view('admin/editProfile');
	}
}
