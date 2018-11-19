<?php

namespace App\Helpers;
use App\User;


class Helper
{	
	public static function getImageUser($id)
	{
		$user = User::find($id);
		$string = url('storage/users/'.$user->image);
		return $string;
	}

	public static function getObjectUser($id)
	{
		$user = User::find($id);
		return $user;
	}
}
