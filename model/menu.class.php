<?php
class Menu {
	public $id;
	public $nome;
	public $url;
	public $idPai;
	public $icone;
	public $idIdioma;
	public $ordem;
	public $descricao;
	
	//Não persistidos
	public $menusFilho;
}
?>