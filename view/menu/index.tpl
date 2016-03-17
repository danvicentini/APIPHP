<div id="basic-form" class="section">
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card-panel">
				<div class="header2 col s12 m6 l3"><i class="material-icons prefix">perm_identity</i> {$smarty.const.LNG_TITULO_MENU_LISTAR}</div>
				<div class="clearfix"></div>
				<div class="row">
					<ul class="collapsible collapsible-accordion" data-collapsible="accordion">
						{foreach from=$listaObjs item=obj}
							<li>
								<div class="collapsible-header secondary">{$obj->nome}</div>
								<div class="collapsible-body" style="" >
								{foreach from=$obj->menusFilho item=mnuFilho}
								  <a href='{$mnuFilho->url}' >
										<div class="waves-effect waves-light col s12 m6 l3" >
											<div class="card primary">
												<div class="card-content white-text">
													<span class="card-title" style="white-space:nowrap;"><i class="material-icons large" style="position:absolute;top:50%;left:70%; opacity:0.5">{$mnuFilho->icone} </i>&nbsp;&nbsp;{$mnuFilho->nome}</span>
													<p style="white-space:nowrap;">&nbsp; <small>{$mnuFilho->descricao}</small></p>
												</div>											
											</div>
										</div>
									</a>
								{/foreach}
								<div class="clearfix"></div>
								</div>
							</li>
						{/foreach}
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>