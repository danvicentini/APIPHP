<div id="basic-form" class="section" >
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card-panel">
				{include file="includes/statusPaginas.tpl" title=status}
				<div class="header2 col s12 m6 l3"> {$smarty.const.LNG_TITULO_USUARIO_CADASTRO}</div>
				<div class="row">
					<form class="col s12" method="post" action="">
						<input type="hidden" name="hdnSalvar" value="1"/>
						<input type="hidden" name="hdnId" value="{$objFormulario->id}"/>
						<input type="hidden" name="hdnTema" id="hdnTema" value="{$objFormulario->flagLayout}"/>
						<input type="hidden" name="hdnPassword" value="{$objFormulario->senha}"/>
						<div class="row">
							<div class="input-field col s12">
								<input id="txtNome" name="txtNome" type="text" value="{$objFormulario->nome}"/>
								<label for="txtNome">{$smarty.const.LNG_LABEL_USUARIO_NOME}</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="txtEmail" name="txtEmail" type="email" value="{$objFormulario->email}"/>
								<label for="txtEmail">{$smarty.const.LNG_LABEL_USUARIO_EMAIL}</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="txtLogin" name="txtLogin" type="text" value="{$objFormulario->login}" />
								<label for="txtLogin">{$smarty.const.LNG_LABEL_USUARIO_LOGIN}</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<select name="lstIdioma" id="lstIdioma">
									<option value="0" disabled>Selecione um Idioma</option>
									{foreach from=$arrIdiomas item=$objIdioma}
										<option data-icon="{$objIdioma->icone}" class="left circle" value="{$objIdioma->id}" {($objFormulario->idIdioma==$objIdioma->id) ? 'selected':''}> {$objIdioma->nome}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<!--<div class="row">
							<div class="input-field col s12">
								<input id="txtPassword" name="txtPassword" type="password" />
								<label for="txtPassword">Password</label>
							</div>
						</div>-->
						
						<div class="row">
						<ul class="collapsible collapsible-accordion" data-collapsible="accordion">
							<li>
								<div class="collapsible-header secondary {('0'==$objFormulario->flagLayout)?'active':''}" onclick='fncAbrirTema()'>{$smarty.const.LNG_LABEL_USUARIO_TEMA}</div>
								<div class="collapsible-body" style="" >
									<div class="input-field col s12">
										<select name="lstTema" id="lstTema">
										<option value="0">Selecione um tema</option>
										{foreach from=$arrTemas item=$objTema}
											<option value="{$objTema->id}" {($objFormulario->idTemaLayout==$objTema->id) ? 'selected':''}> {$objTema->nome}</option>
										{/foreach}
										</select>
										<label>Seleção de Tema</label>
									</div>
									<div class='clearfix'></div>
								</div>
							</li>
							<li>
								<div class="collapsible-header secondary {('1'==$objFormulario->flagLayout)?'active':''}" onclick="fncAbrirCustom()" >{$smarty.const.LNG_LABEL_USUARIO_CUSTOMIZAVEL}</div>
								<div class="collapsible-body" style="" >
									<div class="input-field col s3">
										<span>{$smarty.const.LNG_LABEL_USUARIO_COR_1}:</span>
										<input type="color" name="cpCor1" id="cpCor1" value="{$objFormulario->cor1}"/>
									</div>
									<div class="input-field col s3">
										<span>{$smarty.const.LNG_LABEL_USUARIO_COR_2}:</span>
										<input type="color" name="cpCor2" id="cpCor2" value="{$objFormulario->cor2}"/>
									</div>
									<div class="input-field col s3">
										<span>{$smarty.const.LNG_LABEL_USUARIO_COR_3}:</span>
										<input type="color" name="cpCor3" id="cpCor3" value="{$objFormulario->cor3}"/>							
									</div>
								</div>
							</li>
						</div>
							
						<div class="row">
							<div class="input-field col s12">
								<button class="btn primary waves-effect waves-light right" type="submit" name="action">{$smarty.const.LNG_BOTAO_SALVAR}
									<i class="mdi-content-send right"></i>
								</button>
								<!--<button class="btn danger waves-effect waves-light right" type="button" name="action">{$smarty.const.LNG_BOTAO_CANCELAR}
									<i class="material-icons left">not_interested</i>
								</button>-->
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function fncAbrirTema(){
	$('#hdnTema').val('0');
}
function fncAbrirCustom(){
	$('#hdnTema').val('1');
}
</script>