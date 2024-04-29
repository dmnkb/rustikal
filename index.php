<!doctype html>
<html lang="de">

<head>
	<title>Page Title</title>
	<link rel="stylesheet" href="dist/styles/index.min.css" />
</head>

<body>
	<div class="mask"></div>
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
