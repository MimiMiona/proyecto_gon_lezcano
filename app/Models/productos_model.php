<?php
namespace App\Models;
use CodeIgniter\Model;

class Productos_Model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false; 
    protected $allowedFields = ['nombre_prod','imagen','categoria_id','precio','precio_vta','stock','stock_min','eliminado'];

    public function getProducto(){
        return $this->findAll();
    }

}