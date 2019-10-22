<?php

namespace App\Models\Customer; //ubicación de este archivo

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql'; #nombre del manejador de base de datos default en database.php

    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'customers'; #Nombre de la tabla de la base de datos a utilizar, (recordar que es un modelo por tabla)

    protected $primaryKey = 'idCustomer';

    public $timestamps = false; #para evitar que eloquent cargue los valores created_at y updted_at

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        "idCustomer",
        "name",
        "adress",
        "phone",
        "email",
        "bank account"
    ];

    protected $guarded = [
        "idCustomer"
    ];

    protected $casts = [
        "idCustomer"   => 'integer',
        "name"         => 'string',
        "adress"       => 'string',
        "phone"        => 'integer',
        "email"        => 'string',
        "bank account" => 'integer'
    ];


    protected $dates = [

    ];

}
