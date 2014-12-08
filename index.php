<?php

	$dir_lang = './langues/';

	$page = 'index';

	include('./langues.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

   

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

<head>

	<title>Maxime Chazalviel</title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">

	<!-- Lien vers ma feuille de styles css -->

	<link rel="stylesheet" type="text/css" href="src/index.css" />

	<script type="text/javascript" src="src/cprefixfree.dynamic-dom.js"></script>
	
</head>



<body>

	<div id="ligneNoir" >

	</div>

	

	<div id="ligne" >

	</div>

	

	<div id="home">

		<div id="header">

		<div class="clock">
				<script src="http://d3js.org/d3.v3.js"></script>
				<script>

				var width = 96,
					height = 75,
					radius = Math.min(width, height) / 1.9,
					spacing = .09;

				var formatSecond = d3.time.format("%S s"),
					formatMinute = d3.time.format("%M m"),
					formatHour = d3.time.format("%H h"),
					formatDay = d3.time.format("%a"),
					formatDate = d3.time.format("%d d"),
					formatMonth = d3.time.format("%b");

				var color = d3.scale.linear()
					.range(["hsl(-180,50%,50%)", "hsl(180,50%,50%)"])
					.interpolate(interpolateHsl);

				var arc = d3.svg.arc()
					.startAngle(0)
					.endAngle(function(d) { return d.value * 2 * Math.PI; })
					.innerRadius(function(d) { return d.index * radius; })
					.outerRadius(function(d) { return (d.index + spacing) * radius; });

				var svg = d3.select(".clock").append("svg")
					//.attr("width", width)
					//.attr("height", height)
					.append("g")
					.attr("transform", "translate(" + width  + "," + height / 2 + ")"
					);

				var field = svg.selectAll("g")
					.data(fields)
				  .enter().append("g");

				field.append("path");

				field.append("text");

				d3.transition().duration(0).each(tick);

				//d3.select(self.frameElement).style("height", height + "px");

				function tick() {
				  field = field
					  .each(function(d) { this._value = d.value; })
					  .data(fields)
					  .each(function(d) { d.previousValue = this._value; });

				  field.select("path")
					.transition()
					  .ease("elastic")
					  .attrTween("d", arcTween)
					  .style("fill", function(d) { return color(d.value); });

				  /*field.select("text")
					  .attr("dy", function(d) { return d.value < .5 ? "-.5em" : "1em"; })
					  .text(function(d) { return d.text; })
					.transition()
					  .ease("elastic")
					  .attr("transform", function(d) {
						return "rotate(" + 360 * d.value + ")"
							+ "translate(0," + -(d.index + spacing / 2) * radius + ")"
							+ "rotate(" + (d.value < .5 ? -90 : 90) + ")"
					  });*/

				  setTimeout(tick, 1000 - Date.now() % 1000);
				}

				function arcTween(d) {
				  var i = d3.interpolateNumber(d.previousValue, d.value);
				  return function(t) { d.value = i(t); return arc(d); };
				}

				function fields() {
				  var now = new Date;
				  return [
					{index: .7, text: formatSecond(now), value: now.getSeconds() / 60},
					{index: .6, text: formatMinute(now), value: now.getMinutes() / 60},
					{index: .5, text: formatHour(now),   value: now.getHours() / 24},
					{index: .3, text: formatDay(now),    value: now.getDay() / 7},
					{index: .2, text: formatDate(now),   value: (now.getDate() - 1) / (32 - new Date(now.getYear(), now.getMonth(), 32).getDate())},
					{index: .1, text: formatMonth(now),  value: now.getMonth() / 12}
				  ];
				}

				// Avoid shortest-path interpolation.
				function interpolateHsl(a, b) {
				  var i = d3.interpolateString(a, b);
				  return function(t) {
					return d3.hsl(i(t));
				  };
				}

				</script>
			</div>
			<div class="myName">

				<h1><a  href="./index.php">Maxime Chazalviel</a></h1>

			</div>

				

			<ul class="menu">

				<li><a><?php echo $projets;?></a>

					<ul>

						<li><a href="src/asteroids.php" class="documents">Asteroids</a></li>

						<li><a href="src/opal.php" class="messages">Opal-GUI</a></li>

						<li><a href="src/quadran.php" class="signout">Quadran</a></li>
						
						<li><a href="src/interaction.php" class="irit">IRIT</a></li>

						<!-- <li><a href="#" class="signout"><?php echo $projetut;?></a></li>-->

					</ul>

				</li>

				<li><a href="src/cv.php">CV</a></li>

				<li><a href="src/contact.php">Contact</a></li>

				<!-- <li><a href="#"><?php echo $autres;?></a></li>-->

			</ul>

		</div>

		

		<div id="intitule">

			<?php

				echo $intitule;

			?>

		</div>

		

		<span id="sl_play" class="sl_command"></span>  

		

		<span id="sl_pause" class="sl_command"></span>  

		   

		<section id="slideshow"> 



			<a class="play_commands pause" href="#sl_pause" title="Maintain paused">Pause</a>  

			

			<a class="play_commands play" href="#sl_play" title="Play the animation">Play</a>  

			

			<div class="container">  

				<div class="c_slider"></div>  

					<div class="slider">  

					
						<a href="src/asteroids.php" style="margin-right:-4px">

							<figure>

								<img src="images/space3.jpg" alt=""  height="600" />

								<figcaption>Asteroids</figcaption>

							</figure>

						</a>

						

						<a href="src/opal.php"  style="margin-right:-4px">

							<figure>

								<img src="images/card17.jpg" alt="" height="600" />

								<figcaption>OPAL GUI</figcaption>

							</figure>

						</a>

						

						<a href="src/quadran.php" style="margin-right:-4px">

							<figure>

								<img src="images/mont.jpg" alt="" height="600" />

								<figcaption><?php echo $stage;?></figcaption>

							</figure>

						</a>

						
						
						<a href="src/interaction.php" >

							<figure>

								<img src="images/interaction.jpg" alt="" height="600" />

								<figcaption><?php echo $stageIrit;?></figcaption>

							</figure>

						</a>
						
					</div>  

				</div>  

			<span id="timeline"></span> 

		</section> 

	</div>

	

	<div id="middle" >

		<div id="surmiddle" >

		</div>

	</div>

	

	<div id="presentation">

		<div id="reseaux">

			<div id="facebook">

				<a  href="http://www.facebook.com/sharer.php?u=file://maximechazalviel.fr" target="_blank"><img src="images/ico/Nuova cartella/facebook64.png" alt="facebook" style="border:none"></a>

			</div>

			

			<div id="twitter">

				<a href="http://twitter.com/share?text=An%20Awesome%20Link&url=file://maximechazalviel.fr" target="_blank"><img src="images/ico/Nuova cartella/twitter64.png" alt="twitter" style="border:none"></a>

			</div>

			

			<div id="linkedin">

				<a href="http://fr.linkedin.com/pub/maxime-chazalviel/51/595/505" target="_blank"><img src="images/ico/Nuova cartella/linkedin64.png" alt="linkedin" style="border:none"></a>

			</div>

		</div>

		

		<div id="hpres" >

			<div id="headpres">

			</div>

		</div>

		

		<div id="divpresentation" >

			<?php echo $presentation;?>

		</div>	

			

		<div id ="espace">

		</div>

		

		<div id ="espace">

		</div>

		

		<div id="lignePied">

		</div>

		

		<div id="piedPage">

			<div id="gauche">

				<li><a href="#">Index</a></li>

				<li><a href="src/cv.php">CV</a></li>

				<li><a href="src/contact.php">Contact</a></li>

				<!-- <li><a href="#"><?php echo $autres;?></a></li>-->

			</div>

			<div id="lang">

				<?php

					echo '<li><a  href="./index.php?lang=fr" target="_top"><img src="images/fr.png" alt="Fran&ccedil;ais" style="border:none"></a></li>';

					echo '<li><a  href="./index.php?lang=en" target="_top"><img src="images/en.png" alt="Anglais" style="border:none"></a></li>';

				?>

			</div>

		</div>

	</div>

</body>

</html>

