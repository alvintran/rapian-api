<?php

use App\User;
use App\Transformers\UserTransformer;

class UserTransformerTest extends TestCase {

	protected $expected;
	protected $actual;

	public function setUp()
	{
		parent::setUp();
		$this->expected = [
			'id'         => 1,
			'email'      => 'neverback88@gmail.com',
			'name'       => 'Alvin Tran',
			'phone'      => '0934577886',
			'gender'     => 'Nam',
			'address'    => '15/03 Ngọc Hồi, Hoàng Mai',
			'avatar'     => 'avatar.jpg',
			'active'     => true,
			'last_login' => '24/04/2016 09:30:00',
			'created_at' => '20/01/2016 10:00:00',
			'updated_at' => '20/01/2016 10:00:00',
		];
		$this->actual = new User;
		$this->actual->id = 1;
		$this->actual->last_name = 'Alvin Tran';
		$this->actual->gender = 0;
		$this->actual->email = 'neverback88@gmail.com';
		$this->actual->phone = '0934577886';
		$this->actual->address = '15/03 Ngọc Hồi, Hoàng Mai';
		$this->actual->active = 1;
		$this->actual->avatar = 'avatar.jpg';
		$this->actual->last_login = '2016-04-24 09:30:00';
		$this->actual->created_at = '2016-01-20 10:00:00';
		$this->actual->updated_at = '2016-01-20 10:00:00';
	}

	public function testGetTransformerOfUser()
	{
		$ut = new UserTransformer;
		$user_transformed  = $ut->transform($this->actual);
		$this->assertEquals($this->expected, $user_transformed);
	}

	public function testGetTransformerOfUserWithIntegerFormatDatetime()
	{
		$this->actual->last_login = 1461465000;
		$this->actual->created_at = 1453258800;
		$this->actual->updated_at = 1453258800;

		$ut = new UserTransformer;
		$user_transformed  = $ut->transform($this->actual);

		$this->assertEquals($this->expected, $user_transformed);
	}
}
