<!DOCTYPE html>
<html>
<head>
	<title></title>	
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
					<img id="img2" style="max-width: 50%; max-height: 50%" src="a/a.jpg" atitle="Data image 2">
				
				</center>
			</div>
			<!-- <div id="a">
				<?php
					$a = scandir("a/");
					$b = array("a","b","c");
					foreach ($a as $key => $value) {
				?>
				<img class="a" id = <?php echo $key?> style="display: none;" src="<?php echo "a/".$value ?>"	>
				<?php
					}	
				?>
			</div>
			<div id="b">
				<?php
					$a = scandir("b/");
					
					foreach ($a as $key => $value) {
				?>
				<img  id = <?php echo $key?> style="display: none;" src="<?php echo "b/".$value ?>">
				<?php
					}	
				?>
			</div> -->

			
			<div class="separator"></div>
			<div
			<center><button id="compare" class="btn btn-primary btn-xs">Compare</button></center>

			<div id="result_comparation"></div>
		</div>
	</div>
	
</body>
<body>

	<!-- <img id="id1" src="~$imageUrl`" onload="javascript:showImage();"> -->

	


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
	    // fungsi utk handle file img
	    function handleFileSelect2 (evt) {
	    	var files.src ='a/a.jpg';
	    	for (var i = 0, f; f = files[i]; i++) {
	        // hanya file gambar saja
		        if (!f.type.match('image.*')) {continue;}
		        // instance file redaer API
		        var reader = new FileReader();
		        // baca file dr komputer yg sdh dipilih
		        reader.onload = (function(theFile){
		          // tempel file gambar yg dipilih ke ID img2
		          return function (e) {
		          	$('#img2').attr('src',  e.target.result).attr('title', theFile.name);
		          };
		    	})(f);

				reader.readAsDataURL(f);
			}
		}
	    //add event when file is added.
	    document.getElementById('file1').addEventListener('change', handleFileSelect1, false);
	    document.getElementById('file2').addEventListener(handleFileSelect2);

	    document.getElementsByClassName("a")

	    //compare 2 image
	    $('#compare').click(function(event) {
	    	// add variable
	    	var img1 = document.getElementById('img1');
	    	var r1, g1, b1;


	    	
	    	// read ID of img element
	    	
	    	var img2 = document.getElementsByClassName("a");

	    		var r2, g2, b2;

	    		RGBaster.colors(img1, {
	        	success: function (payload1) {
	        		console.log('image1 rgb', payload1.makeRGBobj);
	        		r1 = payload1.makeRGBobj.r;
	        		g1 = payload1.makeRGBobj.g;
	        		b1 = payload1.makeRGBobj.b;

		            // image 2
		            RGBaster.colors(img2, {
		            	success: function (payload2) {
		            		console.log('image2 rgb', payload2.makeRGBobj);
		            		r2 = payload2.makeRGBobj.r;
		            		g2 = payload2.makeRGBobj.g;
		            		b2 = payload2.makeRGBobj.b;
							// count rgb differences between two image 
							var result_r = r1 - r2;
							var result_g = g1 - g2;
							var result_b = b1 - b2;

							if (result_b != 0 || result_r != 0 || result_g != 0) {
								var resultCount = "Diffirences";
							}
							else if(result_b == 0 && result_r == 0 && result_g == 0)
							{
								var resultCount = "This Same";
								breack();
							}
							append to id #result_comparation
							var resultCount = "<P> RGB IMG 1 : "+payload1.dominant+"</P>"
							+"<p>RGB IMG 2 : "+payload2.dominant+"</p>"
							+"If image1 - image2, So differences is : <br>"
							+"R : "+result_r+"<br>"
							+"G : "+result_g+"<br>"
							+"B : "+result_b+"<br>";
							$('#result_comparation').html(resultCount);


		            	
		        	});
		        }
		    });

	    	});
	        // image 1
	        
	    });
});
</script>


<!-- <script type="text/javascript">
	var _img = document.getElementById('id1');
	var newImg = new Image;
	newImg.onload = function() {
    _img.src = this.src;
}
newImg.src = 'a/a.jpg';

//var listImg[] = ''
</script> -->
</html>