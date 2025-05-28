<?php
namespace App\Models;
use CodeIgniter\Model;

class Consultas_model extends Model
{
	protected $table = 'contacto';
	protected $primaryKey = 'id_usuario';
	protected $allowedFields = ['nombre', 'email', 'mensaje'];
}