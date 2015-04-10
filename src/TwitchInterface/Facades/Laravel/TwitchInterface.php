<?php 
namespace TwitchInterface\Facades\Laravel;


use Illuminate\Support\Facades\Facade;

class TwitchInterface extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'twitchinterface';
	}

}
