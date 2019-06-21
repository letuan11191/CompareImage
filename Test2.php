<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Compare image RGB</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<center><h2>COMPARE IMAGE RGB</h2></center>

			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<center>
					<h4>Image 1</h4>
					<img id="img1" style="max-width: 50%; max-height: 50%" src="assets/img/default.png" atitle="Data image 1">
				<input type="file" name="file1" id="file1" >
				</center>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

				<center>
					<h4>Image 2</h4>
					<?php
					$a = scandir("a/");
					$b = array("a","b","c");
					foreach ($a as $key => $value) {
				?>
				<img class="a" " style="display: none;" src="<?php echo "a/".$value ?>"	>
				<?php
					}	
				?>
				<!-- <input type="file" name="file2" id="file2" > -->
				</center>
			</div>
			<div class="separator"></div>
			<center><button id="compare" class="btn btn-primary btn-xs">Compare</button></center>

			<div id="result_comparation"></div>
		</div>
	</div>
	
</body>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/rgbaster.js"></script>
<script>
	$(document).ready(function() {
		// function for handle file img
		function handleFileSelect1 (evt) {
			var files = evt.target.files;
			for (var i = 0, f; f = files[i]; i++) {
		        // only image file
		        if (!f.type.match('image.*')) {continue;}
		        // instance file redaer API
		        var reader = new FileReader();
		        // read file
		        reader.onload = (function(theFile){
		        	return function (e) {
		            // append image to ID img1
		            $('#img1').attr('src',  e.target.result).attr('title', theFile.name);
		          };
		      	})(f);
		        // perintahkan utk 
		        reader.readAsDataURL(f);
		    }
		}
	   
	    document.getElementById('file1').addEventListener('change', handleFileSelect1, false);

	    $('#compare').click(function(event) {
	    	// add variable
	    	var r1, g1, b1;
	    	var r2, g2, b2;
	    	// read ID of img element
	    	var img1 = document.getElementById('img1');
	    	var img2 = document.getElementsByClassName("a");
	        // image 1
	        var resultCount = "";

	        for(var i = 0; i < img2.length; i++)
	        {
	        	RGBaster.colors(img1, {
	        	success: function (payload1) {
	        		console.log('image1 rgb', payload1.makeRGBobj);
	        		r1 = payload1.makeRGBobj.r;
	        		g1 = payload1.makeRGBobj.g;
	        		b1 = payload1.makeRGBobj.b;

		            // image 2
		            RGBaster.colors(img2[i], {
		            	success: function (payload2) {
		            		console.log('image2 rgb', payload2.makeRGBobj);
		            		r2 = payload2.makeRGBobj.r;
		            		g2 = payload2.makeRGBobj.g;
		            		b2 = payload2.makeRGBobj.b;
							// count rgb differences between two image 
							var result_r = r1 - r2;
							var result_g = g1 - g2;
							var result_b = b1 - b2;

							if(result_b == 0 && result_r == 0 && result_g == 0)
							{
								console.log("Trung");
								resultCount = "This Same";
							}

							// append to id #result_comparation
							
		            	}
		        	});
		        }
		    });
	        	// if(resultCount == "This Same")
	        	// 	{break;}
	        	console.log("i" + i);
	        }
	        if(resultCount == "This Same")
	        {
	        	$('#result_comparation').html(resultCount);
	        }
	        
	        else
	        {
	        	$('#result_comparation').html("Khong trung");
	        }
	        console.log("img2.length: " + img2.length);
	        console.log("result Count: " + resultCount);
	    });
});

</script>
</html>