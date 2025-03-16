class Rectangle {
    constructor(height, width) {
      this.height = height;
      this.width = width;
    }
    area(){
      return this.height * this.width;
    }
    area(H, W){
        return this.H * this.W;
    }
  }
  let rec = new Rectangle(2, 6);
  console.log(rec.area());
  console.log(rec.area(6,6));