<?php
// Namespace donde se encuentra el modelo
namespace App\Models;
// Importamos la clase base Model de CodeIgniter
use CodeIgniter\Model;


// Definimos la clase Productos_model que extiende la clase Model de CodeIgniter
class Productos_Model extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'productos';
    // Campo que es la clave primaria de la tabla
    protected $primaryKey = 'id_producto';
    // Campos de la tabla que se pueden insertar o actualizar
    protected $allowedFields = ['nombre_prod','imagen','categoria_id','precio','precio_vta','stock','stock_min','eliminado'];


    public function getBuilderProductos(){
        //Conecta a la base de datos usando el helper de configuración de CodeIgniter
        $db = \Config\Database::connect();

        //Crea un query builder sobre la tabla prodcutos. Lo cual permite construir consultas SQL
        $builder = $db->table('productos');
        $builder->select('*');

        // Se realiza un JOIN con la tabla categorias
        $builder->join('categorias', 'categorias.id = productos.categoria_id');
        return $builder;
    }  

    // Esta función devuelve los productos según si se pasa o no un $id
    public function getProducto($id = null){
        //La función getBuilderProductos() devuelve el resultado de la consulta como array.
        $builder = $this->getBuilderProductos();
        if($id !== null){
            $builder->where('productos.id_producto', $id);
            $query = $builder->get();
            return $query->getRowArray();
        }
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function updateStock($id = null, $stock_actual = null){
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id_producto', $id);
        $builder->set('productos.stock', $stock_actual);
        $builder->update();
    }
}