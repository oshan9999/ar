<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		body {
  background-color: #ededed;
}

.canvasMain {
  padding-left: 100px;
  width: 50%;
}

.sidenav {
  width: 100px;
  position: fixed;
  top: 40px;
  left: 0px;
}

.sidenav button {
  padding-top: 10px;
  margin-top: 10px;
  border: 1px solid #75E6DA;
  font-size: 20px;
  width: 100px;
  color: #189AB4;
  display: block;
}

.sidenav button:hover {
  color: #75E6DA;
}
	</style>
</head>
<body>
	<div class="canvasMain">
  
<div class="sidenav">
  <button onclick="toggleDraw()">Draw &#9998;</button>
  <button onclick="createRectangle()">Plant</button>
  <button onclick="createGrass()">Grass</button>
  <button onclick="pond()">pond</button>
  <button onclick="coconut()">coconut</button>
  <button onclick="createGrass()">Grass</button>
  <button onclick="createTextbox()"> Text box</button>
  <button onclick="house()"> House</button>
  <button onclick="bucket()">Bucket</button>
   <button onclick="deleteObject()"> Delete &#10006</button>
   <button type="button" id="b">Save</button>
</div>
      <canvas id="demoCanvas"/>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.3.0/fabric.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="main.js"></script>
  <script src="FileSaver.min.js"></script>
  <script src="canvas-toBlob.js"></script>
  <script>
    $('#b').click(function(){
      $('#demoCanvas').get(0).toBlob(function(blob){
          saveAs(blob, "Myimg.png");
      });
    });
  </script>
</html>