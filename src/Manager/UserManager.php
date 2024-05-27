<?php

namespace App\Manager;

use Olympics\Manager\AbstractManager;
use App\Entity\User;

class UserManager extends AbstractManager {
  public function add(User $user) {
		return $this->create(User::class, [
				'fullname' => $user->getFullname(),
				'email' => $user->getEmail(),
				'password' => $user->getPassword(),
				'role' => 'spectateur'
			]
		);
	}

  public function delete(User $user) {
		return $this->remove(User::class, $user->getId());
	}

  public function edit(User $user) {
		return $this->update(User::class, [
				'fullname' => $user->getFullname(),
				'email' => $user->getEmail(),
				'password' => $user->getPassword()
			],
			$user->getId()
		);
	}

	public function find(int $id) {
		return $this->readOne(User::class, [ 'id' => $id ]);
	}

  public function findAll() {
		return $this->readMany(User::class);
	}

  public function findBy(array $filters, array $order = [], int $limit = null, int $offset = null) {
		return $this->readMany(User::class, $filters, $order, $limit, $offset);
	}

  public function findOneBy(array $filters) {
		return $this->readOne(User::class, $filters);
	}


}
