<?php

/**
 * bdusuarios.php
 * Módulo secundario que implementa la clase BDUsuarios.
 *
 */

/** Incluye la clase. */
include_once '../capaDatos/bdplantas.php';

class BDCart extends BDPlantas
{
		/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private int $idpro;
	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private string $email;
	/**
	 * @var integer Codigo del Producto.
	 * @access private
	 */
	private DateTime $fechañadida;


	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setidpro(int $idpro): void
	{
		$this->idpro = $idpro;
	}
	
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setemail(string $email): void
	{
		$this->email = $email;
	}
	
	/**
	 * Método que inicializa el atributo idPromocion.
	 *
	 * @access public
	 * @param integer $idPromocion Identificador de la promoción.
	 * @return void
	 */
	public function setfechañadida(DateTime $fechaañadida): void
	{
		$this->fechañadida = $fechaañadida;
	}
	
	
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getidpro(): int
	{
		return $this->idpro;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getemail(): string
	{
		return $this->email;
	}
	/**
	 * Método que devuelve el valor del atributo fechaFin.
	 *
	 * @access public
	 * @return DateTime Fecha de finalización de la promoción.
	 */
	public function getfechañadida(): DateTime
	{
		return $this->fechañadida;
	}

	
	/**
	 * Método que inserta un nuevo usuario en la base de datos
	 * 
	 * @access public
	 * @return boolean	True si tiene éxito
	 *					False en otro caso
	 */
	public function añadircarrito() : bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->pdocon) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->pdocon->prepare(
					"INSERT INTO cart (id, client_email, created_at datetime)
						VALUES (:id, :client_email, :created_at datetime)");
			/** Vincula un parámetro al nombre de variable especificado. */
			$id = $this->idpro;
			$resultado->bindParam(':id', $id);
			$email = $this->email;
			$resultado->bindParam(':client_email', $email);
			$fechañadida = $this->fechañadida;
			$resultado->bindParam(':created_at datetime', $fechañadida);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Devuelve true si se ha conseguido. */
				return true;
			}
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}
}