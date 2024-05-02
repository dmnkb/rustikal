<!doctype html>
<html lang="de">

<head>
	<title>Page Title</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="dist/styles/index.min.css" />
</head>

<body>
	<!-- Animation mask -->
	<!-- <div class="mask"></div> -->

	<!-- Modal -->
	<div
		x-data="{ isOpen: true }" 
		x-init="$watch('isOpen', isOpen => { isOpen && $dispatch('onMenuOpen') })"
		>
		<button 
			class="menu-button"
			@click="isOpen = true; $nextTick(() => $refs.modalCloseButton.focus());">
			Open Modal
		</button>
		<div 
			class="menu"
			x-show="isOpen"
			>
			<button 
				class="close-button"
				@click="isOpen = false" 
				x-ref="modalCloseButton">
				X
			</button>
			<nav>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Prices</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- Hero -->
	<header class="hero">
		<div class="container typography">
			<?php
			function wrap_words_in_span( string $text ) {
				$words = explode( ' ', $text );
				foreach ( $words as $word ) {
					$word = trim( $word );
					echo "<span><span>$word</span></span>";
				}
			}
			?>
			
			<h1>
				<?php
				$text = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam reiciendis molestias aliquid facere earum magni suscipit consequatur fugit non aspernatur.';
				wrap_words_in_span( $text );
				?>
			</h1>
		</div>
	</header>

	<script src="dist/index.min.js"></script>
</body>

</html>
