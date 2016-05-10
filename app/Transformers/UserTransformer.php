<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	public function transform(User $user)
	{
		$last_login = $user->last_login ? $user->last_login : date("Y/m/d H:i:s");
		$last_login = is_integer($last_login) ? $last_login : strtotime($last_login);
		$last_login = date('d/m/Y H:i:s', $last_login);
		$created_at = date("d/m/Y H:i:s", strtotime($user->created_at));
		$updated_at = date("d/m/Y H:i:s", strtotime($user->updated_at));

		return [
			'id'         => (int) $user->id,
			'email'      => $user->email,
			'name'       => $user->getName(),
			'phone'      => $user->phone,
			'gender'     => $user->gender == 0 ? 'Nam' : 'Nữ',
			'address'    => $user->address,
			'avatar'     => $user->avatar,
			'active'     => $user->active == 0 ? false : true,
			'last_login' => $last_login,
			'created_at' => $created_at,
			'updated_at' => $updated_at,
		];
	}
}
