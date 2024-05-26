<?php

namespace App\Entity;

class User {

	private ?int $id;
	private ?string $fullname;
	private ?string $email;
	private ?string $password;
	private ?string $role;
	private ?string $created_at;

	public function getId(): ?int {
		return $this->id;
	}

	public function getFullname(): ?string {
		return $this->fullname;
	}
	public function setFullname(?string $fullname): void {
		$this->fullname = $fullname;
	}

	public function getEmail(): ?string {
		return $this->email;
	}
	public function setEmail(?string $email): void {
		$this->email = $email;
	}

	public function getPassword(): ?string {
		return $this->password;
	}
	public function setPassword(?string $password): void {
		$this->password = password_hash(
			$password, PASSWORD_BCRYPT);
	}

	public function getRole(): ?string {
		return $this->role;
	}
	public function setRole(?string $role): void {
		$this->role = $role;
	}

	public function getCreatedAt(): ?string {
		return $this->created_at;
	}

}
