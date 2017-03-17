<div id="left-sidebar" class="left-sidebar ">
	<div class="sidebar-scroll">
		<nav class="main-nav">
			<ul class="main-menu">
				<li><?= $this->Html->link('<i class="fa fa-home"></i><span class="text">Accueil</span>', array('controller' => 'Sites','action'=> 'index'), array('escape' => false)); ?></li>
				<li><?= $this->Html->link('<i class="fa fa-book"></i><span class="text">Liste</span>', array('controller' => 'Sites','action'=> 'liste'), array('escape' => false)); ?></li>
				<li><?= $this->Html->link('<i class="fa fa-dot-circle-o"></i><span class="text">Détail</span>', array('controller' => 'Sites','action'=> 'detail'), array('escape' => false)); ?></li>
				<li><?= $this->Html->link('<i class="fa fa-truck fa-flip-horizontal"></i><span class="text">Acheminement</span>', array('controller' => 'Sites','action'=> 'acheminement'), array('escape' => false)); ?></li>
			</ul>
		</nav>
	</div>
</div>