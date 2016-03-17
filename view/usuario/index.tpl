<div id="basic-form" class="section">
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card-panel">
				<div class="header2 col s12 m6 l3"><i class="material-icons prefix"> perm_identity </i> {$smarty.const.LNG_TITULO_USUARIO_LISTAR}</div>
				<div class="row">
					<table id="data-table-simple" class="display" cellspacing="0">
						<thead>
								<tr>
										<th>{$smarty.const.LNG_LABEL_USUARIO_NOME}</th>
										<th>{$smarty.const.LNG_LABEL_USUARIO_LOGIN}</th>
										<th>{$smarty.const.LNG_LABEL_USUARIO_EMAIL}</th>
								</tr>
						</thead>                 
						<tfoot>
								<tr>
										<th>{$smarty.const.LNG_LABEL_USUARIO_NOME}</th>
										<th>{$smarty.const.LNG_LABEL_USUARIO_LOGIN}</th>
										<th>{$smarty.const.LNG_LABEL_USUARIO_EMAIL}</th>
								</tr>
						</tfoot>
						<tbody>
							{foreach from=$listaObjs item=obj}
								<tr>
									<td>{$obj->nome}</td>
									<td>{$obj->login}</td>
									<td>{$obj->email}</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a class="btn-floating btn-large primary" href='{$smarty.const.APPLICATION_ROOT}/usuario/salvar'>
			<i class="large mdi-editor-mode-edit"></i>
		</a>
</div>