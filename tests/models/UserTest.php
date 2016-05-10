<?php

use App\User;
use Mockery as Mock;

class UserTest extends TestCase {
	public function testReturnsFullNameIfGetName()
	{
		$user = new User;
		$user->fullname = 'Alvin Tran';
		$this->assertEquals('Alvin Tran', $user->getName());
	}

	public function testReturnsLastNameIfGetName()
	{
		$user = new User;
		$user->last_name = 'Alvin Tran';
		$this->assertEquals('Alvin Tran', $user->getName());
	}

	public function testReturnsFullNameIfGetNameWithBothOfFullNameAndLastName()
	{
		$user = new User;
		$user->fullname = 'Alvin Tran';
		$user->last_name = 'Tran';
		$this->assertEquals('Alvin Tran', $user->getName());
	}

	public function testReturnsNullIfGetJWTKey()
	{
		$user = new User;
		$this->assertEquals(null, $user->getJWTIdentifier());
	}

	public function testReturnsIDIfGetJWTKey()
	{
		$user = new User;
		$user->id = 1;
		$this->assertEquals(1, $user->getJWTIdentifier());
	}
}
