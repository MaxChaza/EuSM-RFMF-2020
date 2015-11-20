<div id ="visualisationMetExplore">
 	<iframe id ="iFrameMetExploreViz" src="../lib/javascript/metexploreviz/index.html" width="1000" height="600">
		
	</iframe> 
</div>
<?php
    $page = 'metexplore';
	$dir_lang = '../langues/';
	include('../langues.php');
	
	include('./headerProjet.php');
	
?>

<div id="divpresentation" >

	<?php echo $presentation;?>
	
	<div class="reseau">
		<script src="http://d3js.org/d3.v3.min.js"></script>
		<script>

		var width = 700,
			height = 500;

		var color = d3.scale.category20();

		var force = d3.layout.force()
			.charge(-120)
			.linkDistance(30)
			.size([width, height]);

		var svg = d3.select(".reseau").append("svg")
			.attr("width", width)
			.attr("height", height);

		d3.json("miserables.json", function(error, graph) {
		  force
			  .nodes(graph.nodes)
			  .links(graph.links)
			  .start();

		  var link = svg.selectAll(".link")
			  .data(graph.links)
			.enter().append("line")
			  .attr("class", "link")
			  .style("stroke-opacity", ".6")
			  .style("stroke", "#999")
			  .style("stroke-width", function(d) { return Math.sqrt(d.value); });


		  var node = svg.selectAll(".node")
			  .data(graph.nodes)
			.enter().append("circle")
			  .attr("class", "node")
			  .attr("r", 5)
			  .style("fill", function(d) { return color(d.group); })
			  .style("stroke", "#fff")
			  .style("stroke-width", "1.5px")
			  .call(force.drag);

		  node.append("title")
			  .text(function(d) { return d.name; });

		  force.on("tick", function() {
			link.attr("x1", function(d) { return d.source.x; })
				.attr("y1", function(d) { return d.source.y; })
				.attr("x2", function(d) { return d.target.x; })
				.attr("y2", function(d) { return d.target.y; });

			node.attr("cx", function(d) { return d.x; })
				.attr("cy", function(d) { return d.y; });
		  });
		});
		</script>
	</div>
</div>

<div id ="espace">
</div>
<!-- 
<script type='text/javascript' id="metExplorePath" src='../lib/javascript/metExploreViz/metExploreViz.js'></script> 
<script type="text/javascript">
	var visu = new metExploreViz('visualisation');
</script>
 

<script id="microloader" data-app="c2a09d62-4072-4cd8-93fd-00718ff8a8f2" src="../lib/javascript/metExploreViz/microloader.js"></script> 
<script type="text/javascript"> 
    Ext.Microloader.onAllUpdatedAssetsReady = function(){
        Ext.onReady(function() {
            var visu = new metExploreViz('visualisation');
        });
    };
</script>
	-->

<?php	
	include('./piedProjet.php');
?>		
	


