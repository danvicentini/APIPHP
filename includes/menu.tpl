<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav">
	<ul id="slide-out" class="side-nav fixed leftside-navigation">
			<li class="user-details secondary">
					<div class="row">
							<div class="col col s4 m4 l4">
									<img src="images/avatar.png" alt="" class="circle responsive-img valign profile-image">
							</div>
							<div class="col col s8 m8 l8">
									<ul id="profile-dropdown" class="dropdown-content">
											<li><a href="{$smarty.const.APPLICATION_ROOT}/usuario/mesalvar/{$usuario->id}"><i class="mdi-action-face-unlock"></i> {$smarty.const.LNG_MENU_CONFIGURACAO}</a>
											</li>
											<li><a href="{$smarty.const.APPLICATION_ROOT}/usuario/logout"><i class="mdi-hardware-keyboard-tab"></i> {$smarty.const.LNG_MENU_LOGOUT}</a>
											</li>
									</ul>
									<a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a>
									<p class="user-roal">Administrator</p>
							</div>
					</div>
			</li>
			{foreach from=$menu item=obj}
				<li class="bold"><a href="{$smarty.const.APPLICATION_ROOT}{$obj->url}" class="waves-effect waves-light">{$obj->icone} {$obj->nome}</a></li>
			{/foreach}
	</ul>
	<a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only primary"><i class="mdi-navigation-menu"></i></a>
</aside>
<!-- END LEFT SIDEBAR NAV-->