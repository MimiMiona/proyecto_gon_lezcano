<?php
// Namespace donde se encuentra el modelo
namespace App\Models;
// Importamos la clase base Model de CodeIgniter
use CodeIgniter\Model;

// Definimos la clase Consultas_model que extiende la clase Model de CodeIgniter
class Consultas_model extends Model
{
	// Nombre de la tabla en la base de datos
	protected $table = 'consultas';
	
	// Campo que es la clave primaria de la tabla
	protected $primaryKey = 'id_usuario';
	
	// Campos de la tabla que se pueden insertar o actualizar
	protected $allowedFields = ['nombre', 'email', 'mensaje', 'eliminado'];

	// Método que obtiene todos los registros de la tabla consultas
	public function getConsulta(){
		// Devuelve todos los registros como un array
		return $this->findAll();
    }
}