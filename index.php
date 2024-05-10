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
		x-data="{ isOpen: false }" 
		x-init="$watch('isOpen', isOpen => { isOpen && $dispatch('onMenuOpen') })"
		>
		<button 
			class="menu-button"
			@click="
				isOpen = true; 
				$refs.menu.classList.remove('should-close'); 
				$nextTick(() => $refs.modalCloseButton.focus());
				"
			:class="[isOpen ? 'open' : '']"
			>
			<svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M8.17432 12.4969H40.1743M8.17432 24.4969H40.1743M8.17432 36.4969H22.1743" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
		<div 
			class="menu-container"
			x-cloak
			x-show="isOpen"
			>
			<div 
				class="menu" 
				x-ref="menu" 
				:class="[isOpen ? 'should-open' : '']"
				>
				<button 
					class="close-button"
					@click="
						$dispatch('onMenuClose'); 
						$refs.menu.classList.remove('should-open'); 
						$refs.menu.classList.add('should-close'); 
						setTimeout(() => { 
							isOpen = false; 
						}, 500)
						" 
					x-ref="modalCloseButton">
					<svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.3052 36.6218L36.3052 12.6218M12.3052 12.6218L36.3052 36.6218" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
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
			<div 
				class="menu-backdrop"
				@click="
					$dispatch('onMenuClose'); 
					$refs.menu.classList.remove('should-open'); 
					$refs.menu.classList.add('should-close'); 
					setTimeout(() => { 
						isOpen = false; 
					}, 500)
					" 
				></div>
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
