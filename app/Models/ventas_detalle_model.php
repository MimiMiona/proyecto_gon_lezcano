<?php
// Namespace donde se encuentra el modelo
namespace App\Models;
// Importamos la clase base Model de CodeIgniter
use CodeIgniter\Model;


// Definimos la clase Ventas_detalle_model que extiende la clase Model de CodeIgniter
class Ventas_detalle_model extends Model
{
	// Nombre de la tabla en la base de datos
	protected $table = 'ventas_detalle';

	// Campo que es la clave primaria de la tabla
	protected $primaryKey = 'id';

	// Campos de la tabla que se pueden insertar o actualizar
	protected $allowedFields = ['venta_id', 'producto_id', 'cantidad', 'precio'];

	public function getDetalles($id = null, $id_usuario = null){
		//Conecta a la base de datos usando el helper de configuración de CodeIgniter
		$db = \Config\Database::connect();

		//Crea un query builder sobre la tabla ventas_detalle. Lo cual permite construir consultas SQL
		$builder = $db->table('ventas_detalle');
		$builder->select('*');
		
		// Hacemos JOIN con la tabla ventas_cabecera
		$builder->join('ventas_cabecera', 'ventas_cabecera.id = ventas_detalle.venta_id');
		
		// Hacemos JOIN con la tabla productos
		$builder->join('productos', 'productos.id_producto = ventas_detalle.producto_id');
		
		// Hacemos JOIN con la tabla usuarios
		$builder->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.usuario_id');
		
		// Si se pasa un ID de venta, filtramos por ese ID
		if($id != null){
			$builder->where('ventas_cabecera.id', $id);
		}

		//Ejecuta la consulta y devuelve los resultados como un array asociativo
		$query = $builder->get();
		return $query->getResultArray();
	}
}