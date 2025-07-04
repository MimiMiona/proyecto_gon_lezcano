<?php
// Namespace donde se encuentra el modelo
namespace App\Models;
// Importamos la clase base Model de CodeIgniter
use CodeIgniter\Model;


// Definimos la clase Categorias_model que extiende la clase Model de CodeIgniter
class Categorias_model extends Model
{
    // Nombre de la tabla en la base de datos
	protected $table = 'categorias';

    // Campo que es la clave primaria de la tabla
	protected $primaryKey = 'id';

    // Campos de la tabla que se pueden insertar o actualizar
	protected $allowedFields = ['descripcion', 'activo'];

    // Método que obtiene todos los registros de la tabla categorias
	public function getCategorias(){
		// Devuelve todos los registros como un array
		return $this->findAll();
    }
}