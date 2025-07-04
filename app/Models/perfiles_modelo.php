<?php
// Namespace donde se encuentra el modelo
namespace App\Models;
// Importamos la clase base Model de CodeIgniter
use CodeIgniter\Model;


// Definimos la clase Perfiles_model que extiende la clase Model de CodeIgniter
class Perfiles_model extends Model
{
	// Nombre de la tabla en la base de datos
	protected $table = 'perfiles';

	// Campo que es la clave primaria de la tabla
	protected $primaryKey = 'id';

	// Campos de la tabla que se pueden insertar o actualizar
	protected $allowedFields = ['descripcion'];
}