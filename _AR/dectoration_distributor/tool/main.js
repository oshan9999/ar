const myCanvas = new fabric.Canvas("demoCanvas", {
  width: window.innerWidth - 200,
  height: window.innerHeight - 100,
  backgroundColor: "white",
  isDrawingMode: false,
});

const toggleDraw = () => {
  myCanvas.set({ isDrawingMode: !myCanvas.get("isDrawingMode") });
};

const createRectangle = () => {
      fabric.Image.fromURL('plant.jpg',function(img) {
        myCanvas.add(img);
      });
};

const pond = () => {
  fabric.Image.fromURL('pond.png',function(img) {
    myCanvas.add(img);
  });
};

const coconut = () => {
  fabric.Image.fromURL('coco.png',function(img) {
    myCanvas.add(img);
  });
};

const house = () => {
  fabric.Image.fromURL('house.jpg',function(img) {
    myCanvas.add(img);
  });
};

const bucket = () => {
  fabric.Image.fromURL('bucket.png',function(img) {
    myCanvas.add(img);
  });
};

const createGrass = () => {
      fabric.Image.fromURL('grass.jpg',function(img) {
        myCanvas.add(img);
      });
};

const createTextbox = () => {
  const textbox = new fabric.Textbox("Hakuna Matata",{
    width : 400,
  });
  myCanvas.add(textbox);
};

const deleteObject = () => {
  if(myCanvas.getActiveObject()){ myCanvas.remove(myCanvas.getActiveObject());
  }
}

const save = () => {
  $(myCanvas).get(0).toBlob(function(blob){
      saveAs(blob, "Myimg.png");
  });
}
