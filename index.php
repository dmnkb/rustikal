<!doctype html>
<html lang="de">

<head>
	<title>Page Title</title>
	<link rel="stylesheet" href="dist/styles/index.min.css" />
</head>

<body>
	<header class="hero">
		<div class="container specs">
			<div><span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum fuga neque maiores repellat nulla minus laborum hic minima, sed nam.</span></div>
			<div><span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum fuga neque maiores repellat nulla minus laborum hic minima, sed nam.</span></div>
			<div><span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum fuga neque maiores repellat nulla minus laborum hic minima, sed nam.</span></div>
		</div>
		<div class="container typography">
			<?php
			function wrapWordsInSpan($text)
			{
				$words = explode(' ', $text);
				foreach ($words as $word) {
					$word = trim($word);
					echo "<span><span>$word</span></span>";
				}
			}
			?>
			<h1>
				<?php
				$text = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam reiciendis molestias aliquid facere earum magni suscipit consequatur fugit non aspernatur.";
				wrapWordsInSpan($text);
				?>
			</h1>
		</div>
	</header>
	<div class="mask"></div>
	<script src="dist/index.min.js"></script>
</body>

</html>