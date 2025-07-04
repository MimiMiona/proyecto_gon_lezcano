<?php
// Namespace donde se encuentra el modelo
namespace App\Models;
// Importamos la clase base Model de CodeIgniter
use CodeIgniter\Model;


// Definimos la clase Usuarios_model que extiende la clase Model de CodeIgniter
class Usuarios_model extends Model
{

	// Nombre de la tabla en la base de datos
	protected $table = 'usuarios';

    // Campo que es la clave primaria de la tabla
	protected $primaryKey = 'id_usuario';

	// Campos de la tabla que se pueden insertar o actualizar
	protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass', 'perfil_id', 'baja'];
}