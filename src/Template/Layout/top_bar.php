<nav class="top-bar navbar-fixed-top">
	<div class="container">
		<div class="clearfix">
			<a href="#" class="pull-left toggle-sidebar-collapse"><i class="fa fa-bars"></i></a>
			<!-- logo -->
			<div class="pull-left left logo">
				<a href="index"><?= $this->Html->image('kingadmin-logo-white.png'); ?></a>
				<h1 class="sr-only">Famiday Admin Dashboard</h1>
			</div>
			<!-- end logo -->
			<div class="pull-right right">
				<div class="searchbox">
					<div id="tour-searchbox" class="input-group">
						<input class="form-control" placeholder="enter keyword here..." type="search">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</div>
				<!-- top-bar-right -->
				<div class="top-bar-right">
					<div class="notifications">
						<ul>
							<!-- notification: inbox -->
							<li class="notification-item inbox">
								<div class="btn-group">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-envelope"></i><span class="count">2</span>
										<span class="circle"></span>
									</a>
									<ul class="dropdown-menu" role="menu">
										<li class="notification-header">
											<em>You have 2 unread messages</em>
										</li>
										<li class="inbox-item clearfix">
											<a href="#">
												<div class="media">
													<div class="media-left">
														<?= $this->Html->image('user1.png'); ?>
													</div>
													<div class="media-body">
														<h5 class="media-heading name">Antonius</h5>
														<p class="text">The problem just happened this morning. I can't see ...</p>
														<span class="timestamp">4 minutes ago</span>
													</div>
												</div>
											</a>
										</li>
										<li class="notification-footer">
											<a href="#">View All Messages</a>
										</li>
									</ul>
								</div>
							</li>
							<!-- end notification: inbox -->
							<!-- notification: general -->
							<li class="notification-item general">
								<div class="btn-group">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-bell"></i><span class="count">8</span>
										<span class="circle"></span>
									</a>
									<ul class="dropdown-menu" role="menu">
										<li class="notification-header">
											<em>You have 8 notifications</em>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-comment green-font"></i>
												<span class="text">New comment on the blog post</span>
												<span class="timestamp">1 minute ago</span>
											</a>
										</li>
										<li class="notification-footer">
											<a href="#">View All Notifications</a>
										</li>
									</ul>
								</div>
							</li>
							<!-- end notification: general -->
						</ul>
					</div>
					<!-- logged user and the menu -->
					<div class="logged-user">
						<div class="btn-group">
							<a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
								<?= $this->Html->image('user-avatar.png') ?>
								<span class="name">Stacy Rose</span> <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="#">
										<i class="fa fa-user"></i>
										<span class="text">Profile</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-power-off"></i>
										<span class="text">Logout</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- end logged user and the menu -->
				</div>
				<!-- end top-bar-right -->
			</div>
		</div>
	</div>
	<!-- /container -->
</nav>