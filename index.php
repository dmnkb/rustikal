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
	<div class="wrapper">
		<header class="navigation grid grid-cols-12">
			<div class="col-span-4 left">
				<h1>Rustikal <span>WordPress Theme</span></h1>
			</div>
			<div class="col-span-8 right">
				<span>
					Foo Bar
				</span>
				<nav>
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
				</nav>
			</div>
		</header>
	
		<main>
			<div class="top">
				<?php
				function wrap_words_in_span( string $text ) {
					$words = explode( ' ', $text );
					foreach ( $words as $word ) {
						$word = trim( $word );
						echo "<span><span>$word</span></span>";
					}
				}
				?>
				<h2>
					<?php
						$text = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam reiciendis molestias aliquid facere earum magni suscipit consequatur fugit non aspernatur.';
						wrap_words_in_span( $text );
					?>
				</h2>
			</div>
			<div class="bottom grid grid-cols-12">
				<div class="col-span-2 picture">
					<a href="https://unsplash.com/de/fotos/leere-bank-mit-weissem-metallrahmen-ausserhalb-der-glaswand-HAWznwL29qI?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" target="_blank">
						<img src="assets/images/rizky-subagja-HAWznwL29qI-unsplash.jpg" alt="Interrior 1" title="unsplash.com/de/@subagjav"/>
					</a>
				</div>
				<div class="col-span-4 text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus blanditiis velit nihil doloribus suscipit provident nisi magnam accusantium! Illum iste officia doloremque facilis vitae? Temporibus maiores vel repudiandae excepturi ipsum.
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus blanditiis velit nihil doloribus suscipit provident nisi magnam accusantium! Illum iste officia doloremque facilis vitae? Temporibus maiores vel repudiandae excepturi ipsum.
				</div>
				<div class="col-span-4 text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus blanditiis velit nihil doloribus suscipit provident nisi magnam accusantium! Illum iste officia doloremque facilis vitae? Temporibus maiores vel repudiandae excepturi ipsum.
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus blanditiis velit nihil doloribus suscipit provident nisi magnam accusantium! Illum iste officia doloremque facilis vitae? Temporibus maiores vel repudiandae excepturi ipsum.
				</div>
				<div class="col-span-2 picture">
				<a href="https://unsplash.com/de/fotos/weisser-metallrahmen-in-der-nahe-der-weissen-wand-gBV6FpV1ReE?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" target="_blank">
					<img src="assets/images/mintosko-gBV6FpV1ReE-unsplash.jpg" alt="Interrior 2" title="unsplash.com/de/@mintosko"/>
				</a>	
				</div>
			</div>
		</header>
	
	</main>
	<script src="dist/index.min.js"></script>
</body>
</html>
