<?php
namespace App\Models;
use CodeIgniter\Model;

class Consultas_model extends Model
{
	protected $table = 'consultas';
	protected $primaryKey = 'id_usuario';
	protected $allowedFields = ['nombre', 'email', 'mensaje', 'eliminado'];

	public function getConsulta(){
		return $this->findAll();
    }
}