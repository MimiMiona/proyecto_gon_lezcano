<?php

namespace Config;

use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    /**
     * Servicio para el carrito de compras.
     */
     public static function cart(bool $getShared = true)
    {
        // Esto asegura que solo haya una instancia del carrito en tu aplicación.
        if ($getShared) {
            return static::getSharedInstance('cart');
        }

        // Esta es la línea clave que crea una nueva instancia de la clase Cart del módulo.
        // Asegúrate de que el namespace \CodeIgniterCart\Cart sea el correcto
        // basado en la estructura de archivos del módulo que descargaste.
        return new \App\Libraries\Cart();
    }

    // Aquí puedes agregar otros servicios personalizados si lo necesitas
}