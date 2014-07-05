<?php

class HomepageController extends BaseController {

	public function showHomepage()
	{
		return View::make('homepage');
	}

}