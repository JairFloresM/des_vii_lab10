<?php

require_once('modelo.php');

class votos extends modeloCredencialesDB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar_votos()
    {
        $instruccion = "CALL sp_listar_votos()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) {
            echo "Fallo al consultar las noticias";
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    public function actualizar_votos($voto1, $voto2)
    {
        $instruccion = "CALL sp_actualizar_votos(" . $voto1 . "," . $voto2 . ")";
        $actualizada = $this->_db->query($instruccion);

        if (!$actualizada) {
            echo "Fallo al actualizar las noticias";
        } else {
            return $actualizada;
            $actualizada->close();
            $this->_db->close();
        }
    }
}
