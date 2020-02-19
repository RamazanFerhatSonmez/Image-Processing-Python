<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.container{
			margin-top: 60px;
			border-radius: 5px;
			/* box-shadow: none; */
			box-shadow: 0 1px 2px 0px rgba(85, 85, 85, 0.2);
			margin-bottom: 20px;
			margin-left: 25px;
			margin-right: 25px;
			background: white;
		}
		body {
			background-color: #e9ebee;
		}
		.port_folio-filter ul li {
			display: inline-block;
			border-radius: 5px;
			font-size: 14px;
			color: #1C3553;
			cursor: pointer;
			font-family: 'Source Sans Pro', sans-serif;
			position: relative;
			text-transform: uppercase;
			padding: 15px 20px;
			overflow: hidden;
			-o-transition: all .3s ease;
			transition: all .3s ease;
			box-shadow: rgb(85,85,85,0.4) 0px 1px 4px 0px;
			margin-bottom: 15px;
			background: white;
			width: 185px;
		}
		.listyle{    border: 1px solid #d9d9d9;
			width: 160px;
			float: left;
			margin-left: -40px;
			margin-bottom: 15;
		}
		.btn-success {
			border: 1px solid gray !important;
			background: #1895FF !important;
		}
		.port_folio-filter ul li.active {
			background-color: #FFFFFF;
			font-weight: bold;
			color: #1895ff;
			font-weight: bold;
			border: 2px solid #1895ff !important;
			box-shadow: rgb(85,85,85,1) 0px 2px 6px 0px;
		}
		.port_folio-filter ul li.active label:after {
			content: "\2713";
			width: 30px;
			height: 30px;
			color: #1895FF;
			line-height: 29px;
			border-radius: 100%;
			z-index: 999;
			position: absolute;
			top: -16px;
			right: -162px;
			font-weight: 900;
			font-size: x-large;
		}
		.port_folio-filter ul li label {
			color: #203353;
			position: absolute;
			z-index: 0;
			left: 8px;
			top: 12px;
			color: #999;
			font-size: 16px;
			display: inline-block;
			padding: 0px 10px;
			font-weight: 400;
			background-color: none;
			-moz-transition: color 0.3s, top 0.3s, background-color 0.8s;
			-o-transition: color 0.3s, top 0.3s, background-color 0.8s;
			-webkit-transition: color 0.3s, top 0.3s, background-color 0.8s;
			transition: color 0.3s, top 0.3s, background-color 0.8s;
		}
		.file-upload {
			background-color: #ffffff;
			width: 100%;
			margin: 0 auto;
			padding: 20px;
		}

		.file-upload-btn {
			width: 150px;
			margin-left: -100px
			margin: 0;
			color: #fff;
			background: #1895ff;
			border: none;
			padding: 10px;
			border-radius: 4px;
			border-bottom: 4px solid #1C3553;
			transition: all .2s ease;
			outline: none;
			text-transform: uppercase;
			font-weight: 700;
		}

		.file-upload-content {
			display: none;
			text-align: center;
		}

		.file-upload-input {
			position: absolute;
			margin: 0;
			padding: 0;
			width: 100%;
			height: 100%;
			outline: none;
			opacity: 0;
			cursor: pointer;
		}

		.image-upload-wrap {
			margin-top: 20px;
			width: 460px;
			height: 260px;
			border: 4px dashed #1895ff;
			position: absolute;
			margin-left: -110px;
		}
		.image-wrap {
			border: 4px dashed #1895ff;
			height: 265px;
		}

		.image-title-wrap {
			padding: 0 15px 15px 15px;
			color: #222;
			margin-left: -200px;
		}

		.drag-text {
			text-align: center;
		}

		.drag-text h3 {
			font-weight: 100;
			text-transform: uppercase;
			color: #1C3553;
			padding: 60px 0;
		}

		.file-upload-image {
			max-height: 350px;
			max-width: 420px;
			margin: auto;
			padding: 27px;
			margin-left: -320px;
		}

		.remove-image {
			width: 200px;
			margin: 0;
			color: #fff;
			background: #cd4535;
			border: none;
			padding: 10px;
			border-radius: 4px;
			border-bottom: 4px solid #b02818;
			transition: all .2s ease;
			outline: none;
			text-transform: uppercase;
			font-weight: 700;
		}

		.remove-image:hover {
			background: #c13b2a;
			color: #ffffff;
			transition: all .2s ease;
			cursor: pointer;
		}

		.remove-image:active {
			border: 0;
			transition: all .2s ease;
		}
		.imageprocessing{
			font-weight: 100;
			text-transform: uppercase;
			color: #1C3553;
			padding: 60px 0;
		}
		.imageprocessing{
			margin: 0;
			padding: 0;
			width: 417px;
			height: 260px;
			outline: none;
			cursor: pointer;
		}
		.newimagediv{
			margin-top: -385px;
		}
		.originimage{
			display: block !important;
			margin-top: 0px;
			margin-bottom: -15px;
			float: left;
		}
		.newimage{
			display: block !important;
			margin-top: -30px;
			color: #1c3553;
			margin-bottom: -26px;
			float: left;
		}
	</style>
</head>
<body>
    <!-- <form action='' method="post" >
        <button id="btnPost" type="submit" style="background-color:#1895FF;font-weight: bold;color:white;">Resmi Gönder</button>
    </form> -->
    <div class="container">
    	<form action="" method="GET">
    		<div class="row">
    			<div class="col-md-3 port_folio-filter">
    				<h2 style="color:#1C3553;">İşleme Türü</h2>
    				<ul style=" margin-top: 15px;">
    					<li class="listyle">
    						<label for="Convolution"> </label>
    						<input type="radio" name="imageprocess" id="Convolution" value="convol" style="display: none !important">
    						Convolution
    					</li>
    					<li class="listyle">
    						<label for="Averaging"> </label>
    						<input type="radio" name="imageprocess" id="Averaging" value="averaging" style="display: none !important">
    						Averaging
    					</li>
    					<li class="listyle">
    						<label for="GaussianFiltering"> </label>
    						<input type="radio" name="imageprocess" id="GaussianFiltering" value="gaus_filter" style="display: none !important">
    						Gaussian Filtering
    					</li>
    					<li class="listyle">
    						<label for="median"> </label>
    						<input type="radio" name="imageprocess" id="median" value="median" style="display: none !important">
    						Median Filtering
    					</li>
    					<li class="listyle">
    						<label for="bilateral"> </label>
    						<input type="radio" name="imageprocess" id="bilateral" value="bilateral" style="display: none !important">
    						Bilateral Filtering
    					</li>
    					<li class="listyle">
    						<label for="binary"> </label>
    						<input type="radio" name="imageprocess" id="binary" value="binary" style="display: none !important">
    						THRESH_BINARY
    					</li>
    					<li class="listyle">
    						<label for="THRESH_BINARY_INV"> </label>
    						<input type="radio" name="imageprocess" id="THRESH_BINARY_INV" value="binary_inv" style="display: none !important">
    						THRESH_BINARY_INV
    					</li>
    					<li class="listyle">
    						<label for="THRESH_TRUNC"> </label>
    						<input type="radio" name="imageprocess" id="THRESH_TRUNC" value="trunc" style="display: none !important">
    						THRESH_TRUNC
    					</li>
    					<li class="listyle">
    						<label for="THRESH_TOZERO"> </label>
    						<input type="radio" name="imageprocess" id="THRESH_TOZERO" value="tozero" style="display: none !important">
    						THRESH_TOZERO
    					</li>   
    					<li class="listyle">
    						<label for="THRESH_TOZERO_INV"> </label>
    						<input type="radio" name="imageprocess" id="THRESH_TOZERO_INV" value="trunc_inv" style="display: none !important">
    						THRESH_TOZERO_INV
    					</li>
    				</ul>
    			</div>
    			<div class="col-md-8">
    				<div class="row">
    					<div  class="col-md-7">
    						<div class="file-upload">
    							<button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

    							<div class="image-upload-wrap">
    								<input class="file-upload-input" type='file' onchange="readURL(this)" accept="image/*" />
    								<div class="drag-text">
    									<h3>Orginal Image</h3>
    								</div>
    							</div>
    							<div class="file-upload-content">
    								<h3 style="display: none;" class="originimage" id="originimage"> Orginal Image</h3>
    								<img class="file-upload-image" name="img" src="#" alt="your image" />
    								<div class="image-title-wrap">
    									<button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="col-md-7" id="newimagediv" style="float: right;margin-right: -90px;">
    						<div class="image-wrap">
    							<div class="file-upload" style="float:right;    margin-top: -86px; ">
    								<button  id="btnPost" type="submit"  style="background-color:#1895FF;font-weight: bold;color:white;margin-left: 260px; " class="file-upload-btn">Gönder</button>

    							</div>
    							<h3 style="display: none;" class="newimage" id="newimage"></h3>
    							<div class="drag-text">
    								<!--     								<h3 style="display: none;" class="originimage" id="originimage"> Orginal Image</h3> -->
    								<img class="imageprocessing" src="noimage.png">
    							</div>
    						</div>
    					</div>
    				</div>

    			</div>
    		</div>
    	</form>
    </div>
</body>
</html>
<script
src="https://code.jquery.com/jquery-2.2.4.js"
integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
crossorigin="anonymous"></script>
<?php 


?>
<script type="text/javascript">

	$(document).ready(function () {
		$('#btnPost').on('click', function (event) {
			event.preventDefault();
			var values = document.getElementsByName("imageprocess");
			var values_src = document.getElementsByName("img");
			var selectedValue = "";
			for(var i = 0; i < values.length; i++) {
				if(values[i].checked == true) {
					selectedValue = values[i].value;
				}
			}

			var settings = {
				"async": true,
				"crossDomain": true,
				"url": "http://127.0.0.1:5000/image_process?img_path=C:/xampp/htdocs/python/new_2.png&img_type="+selectedValue,
				"method": "GET",
				"headers": {
					"cache-control": "no-cache",
				}
			}

			$.ajax(settings).done(function (response) {
				debugger
				$('.imageprocessing').attr('src',response.imgNew)
				$('#newimage').addClass('newimage');
				$('#newimage').html(response.desc);
				console.log(response);
			});
		});
		$filters2 = $('.port_folio-filter ul li');
		$filters2.on('click', function(){
			$filters2.removeClass('active');
			$(this).addClass('active');
			$(this)[0].children[1].checked = true;
		});
	});
	function readURL(input) {
		if (input.files && input.files[0]) {

			var reader = new FileReader();
			debugger
			reader.onload = function(e) {
				$('.image-upload-wrap').hide();
				debugger
				$('.file-upload-image').attr('src', e.target.result);
				$('#newimagediv').addClass('newimagediv')
				$('#originimage').addClass('originimage');
				$('.file-upload-content').show();

				$('.image-title').html(input.files[0].name);
			};

			reader.readAsDataURL(input.files[0]);

		} else {
			removeUpload();
		}
	}

	function removeUpload() {
		$('.file-upload-input').replaceWith($('.file-upload-input').clone());
		$('.file-upload-content').hide();
		$('.image-upload-wrap').show();
		$('#newimagediv').removeClass('newimagediv')
		$('#originimage').removeClass('originimage');
	}
	$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
	});
// url: "http://127.0.0.1:5000/image_process?img_path=C:/xampp/htdocs/python/2.png&img_type=averaging",


</script>