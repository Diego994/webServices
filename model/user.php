<?php
	class User
	{
		private $pdo;
		
		public $id;
		public $name;
		public $lastName;
		public $password;
		public $email;
		public $telefon;

		public function __CONSTRUCT()
		{
			try
			{
				$this->pdo = Database::StartUp();     
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}

		public function Listar()
		{
			try
			{
				$result = array();

				$stm = $this->pdo->prepare("SELECT * FROM user");
				$stm->execute();

				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}

		public function Obtener($id)
		{
			try 
			{
				$stm = $this->pdo
						->prepare("SELECT * FROM user WHERE id = ?");
						

				$stm->execute(array($id));
				return $stm->fetch(PDO::FETCH_OBJ);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		public function Eliminar($id)
		{
			try 
			{
				$stm = $this->pdo
							->prepare("DELETE FROM user WHERE id = ?");			          

				$stm->execute(array($id));
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		public function Actualizar($data)
		{
			try 
			{
				$sql = "UPDATE user SET 
							name          = ?, 
							lastName        = ?,
							password        = ?,
							email            = ?, 
							telefon = ?
						WHERE id = ?";

				$this->pdo->prepare($sql)
					->execute(
						array(
							$data->name, 
							$data->lastName,
							$data->password,
							$data->email,
							$data->telefon,
							$data->id
						)
					);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		public function Registrar(User $data)
		{
			try 
			{
			$sql = "INSERT INTO user (name,lastName,password,email,telefon) 
					VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->name,
						$data->lastName, 
						$data->password, 
						$data->email,
						$data->telefon
					)
				);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}
}