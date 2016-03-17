<?php
class Usuario extends Auditavel{
	public $id;
	public $nome;
	public $login;
	public $senha;
	public $idIdioma;
	public $idTemaLayout;	
	public $imagem;
	public $email;	
	public $cor1;	
	public $cor2;	
	public $cor3;	
	public $flagLayout;	
	
	//NÃO PERSISTIDOS
	public $cssTema;
	public $siglaIdioma;
	
}
?>