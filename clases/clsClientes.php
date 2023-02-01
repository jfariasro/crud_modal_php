<?php
class Cliente
{
    public $id;
    public $nombre;
    public $edad;
    public $cedula;
    public $email;
    public $direccion;

    function __construct($id, $nombre, $edad, $cedula, $email, $direccion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->cedula = $cedula;
        $this->email = $email;
        $this->direccion = $direccion;
    }

    public function Agregar($con)
    {
        $insertar = "INSERT INTO clientes(id, nombre, edad, cedula, email, direccion)
        VALUES('$this->id', '$this->nombre', '$this->edad', '$this->cedula', '$this->email', '$this->direccion')";
        $exe = mysqli_query($con, $insertar);
        if ($exe !== false) {
            MensajeExitoso("Cliente Registrado al Sistema");
        } else {
            MensajeError("El Cliente No Pudo Ser Registrado al Sistema");
        }
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE clientes SET
        nombre = '$this->nombre', edad = '$this->edad', cedula = '$this->cedula',
        email = '$this->email', direccion = '$this->direccion'
        WHERE id = '$this->id'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Cliente Modificado");
        } else {
            MensajeError("El Cliente No Pudo Ser Modificado");
        }
    }

    public function Eliminar($con)
    {
        $eliminar = "DELETE FROM clientes WHERE id = '$this->id'";
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Cliente Eliminado del Sistema");
        } else {
            MensajeError("El Cliente No Pudo Ser Eliminado");
        }
    }
}
