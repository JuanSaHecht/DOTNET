<?php

require("fichaPeliculaAccesoDatos.php");

class FichaPeliculaReglasNegocio
{
    private $_ID;
    private $_Titulo;
    private $_Año;
    private $_Duracion;
    private $_Sinopsis;
    private $_Imagen;
    private $_Votos;
    private $_NombreDirector;

	function __construct()
    {
    }

    function init($id,$titulo,$año,$duracion,$sinopsis,$imagen,$votos,$nombreDirector)
    {
        $this->_ID = $id;
        $this->_Titulo = $titulo;
        $this->_Año = $año;
        $this->_Duracion = $duracion;
        $this->_Sinopsis = $sinopsis;
        $this->_Imagen = $imagen;
        $this->_Votos = $votos;
        $this->_NombreDirector = $nombreDirector;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getTitulo()
    {
        return $this->_Titulo;
    }

    function getAño()
    {
        return $this->_Año;
    }

    function getDuracion()
    {
        return $this->_Duracion;
    }

    function getSinopsis()
    {
        return $this->_Sinopsis;
    }

    function getImagen()
    {
        return $this->_Imagen;
    }

    function getVotos()
    {
        return $this->_Votos;
    }

    function getNombreDirector()
    {
        return $this->_NombreDirector;
    }


    function obtener($id_pelicula)
    {
        
        $peliculasDAL = new FichaPeliculaAccesoDatos();
        $rs = $peliculasDAL->obtener($id_pelicula);
        
        $pelicula = $rs;
        
        
            $oPeliculasReglasNegocio = new FichaPeliculaReglasNegocio();
            $oPeliculasReglasNegocio->Init($pelicula['ID'],$pelicula['titulo'],$pelicula['año'],$pelicula['duracion'],$pelicula['sinopsis'],$pelicula['imagen'],$pelicula['votos'],$pelicula['nombre']);
        
            
        return $oPeliculasReglasNegocio;
    }
}
