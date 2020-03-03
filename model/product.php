<?php
	class Product
	{
		public $pdo;
		
		public $id;
		public $name;
		public $cost;
		public $description;
		public $availability;
        public $stock;
        public $image;

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
        
		public function Obtener($id)
		{
			try 
			{
				$stm = $this->pdo
						->prepare("SELECT * FROM product WHERE id = ?");
						

				$stm->execute(array($id));
				return $stm->fetch(PDO::FETCH_OBJ);
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
							cost        = ?,
							description        = ?,
							availability            = ?, 
							stock = ?,
                            image = ?
						WHERE id = ?";

				$this->pdo->prepare($sql)
					->execute(
						array(
							$data->name, 
							$data->cost,
							$data->description,
							$data->availability,
                            $data->stock,
                            $data->image,
							$data->id
						)
					);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

        public function Registrar(Product $data)
		{
			try 
			{
			$sql = "INSERT INTO product (name,cost,description,availability,stock,image) 
					VALUES (?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->name,
						$data->cost, 
						$data->description, 
						$data->availability,
                        $data->stock,
                        $data->image
					)
				);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}
    }
