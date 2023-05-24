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
  <button onclick="createTextbox()"> Text box</button>
   <button onclick="deleteObject()"> Delete &#10006</button>
</div>
      <canvas id="demoCanvas"/>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.3.0/fabric.min.js"></script>
	<script src="main.js"></script>
</html>