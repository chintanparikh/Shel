<?php

class Dispatcher
{
	
	public function dispatch($dispatch)
	{
		foreach ($dispatch['routes'] as $route=>$function)
		{
			if (preg_replace($route, '', $dispatch['URI']) === '')
			{
				call_user_func($function);
				break;
			}
		}

	}
}