<?php

namespace Greatworks\Menular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * MenularController
 *
 * @author Gattigaga Hayyuta Dewa <gattigaga@gmail.com>
 * 
 */

class MenularGentelellaController extends Controller
{
	/**
	 * Open a index page
	 *
	 * @return string Webpage which show in the browser
	 */

	public function index()
	{
		return view('menular::dashboard_gentelella');
	}
}
