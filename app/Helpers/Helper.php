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

	public static function getFirstName($user){
		$name = explode( ' ', $user->name);
		return $name[0];
	}

	
	public static function getFirstNameString($user){
		$name = explode( ' ', $user);
		return $name[0];
	}



	public static function getFirstNameWithObject($id){
		$user = User::find($id);
		$name = explode(' ', $user->name);
		return $name[0];
	}
}
