<?php

	abstract class Type {
		const SHOW_ALWAYS 		  = 0;
		const SHOW_WHEN_LOGGED_IN = 1;
		const HIDE_WHEN_LOGGED_IN = 2;
	}

	class Item {

		# name of the item
		private $name;

		# if you must be logged in to view
		private $type;

		# link of nav item
		private $link;

		public function __construct($name, $type, $link) {
			$this->name = $name;
			$this->type = $type;
			$this->link = $link;
		}

		public function getName() {
			return $this->name;
		}

		public function getType() {
			return $this->type;
		}

		public function getLink() {
			return $this->link;
		}

	}

?>

<div class="header">
	<ul class="nav nav-pills pull-right">

		<?php 
			# navigation items
			# link to page => name on navigation page
			$navItem = array(
				new Item("Home", Type::SHOW_ALWAYS, "index.php"),
				new Item("New Post", Type::SHOW_WHEN_LOGGED_IN, "new-post.php"),
				new Item("Login", Type::HIDE_WHEN_LOGGED_IN, "po-login.php"),
			);

			foreach ($navItem as $item) {
				$name = $item->getName();
				$type = $item->getType();
				$link = $item->getLink();

				# get if page is active
				$active = $pesto->isCurrentPage($link) ? 'class="active"' : '';

				switch ($type) {
					case Type::SHOW_ALWAYS:
						echo "<li {$active}><a href='{$link}'>{$name}</a></li>";
						break;
					case Type::SHOW_WHEN_LOGGED_IN:
						if ($pesto->isLoggedIn())
							echo "<li {$active}><a href='{$link}'>{$name}</a></li>";
						break;
					case Type::HIDE_WHEN_LOGGED_IN:
						if (!$pesto->isLoggedIn())
							echo "<li {$active}><a href='{$link}'>{$name}</a></li>";
						break;
					default:
						# do nothing
						break;
				}
			}
		?>
	</ul>
	<h3 class="brand">Blog Name<br /> <span class="small">Probably the best blog ever made</span></h3>
</div>