{if isset($strErroMsg) && !$strErroMsg eq ''}
	<div class="row">
	<div class="col s12">
		<div class="card-panel red lighten-4">
			<span>{$strErroMsg}</span>
		</div>
	</div>
	</div>
	{/if}
	{if isset($blnSucesso) && $blnSucesso}
	<div class="row">
	<div class="col s12">
		<div class="card-panel green lighten-4">
			<span>{$smarty.const.LNG_MENSAGEM_SUCESSO}</span>
		</div>
	</div>
	</div>
{/if}