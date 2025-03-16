rec = new RectangleD(2, 6);
console.log(rec);
// Declaration
class RectangleD {
  constructor(height, width) {
    this.height = height;
    this.width = width;
  }
   area(){
    return this.height * this.width;
  }
}
//let rec = new RectangleD(2, 6);
//console.log(rec.area());

// Expression; the class is anonymous but assigned to a variable
//const RectangleE = class {
  const RectangleE = class name {
  constructor(height, width) {
    this.height = height;
    this.width = width;
  }
  area(){
    return this.height*this.width;
  }
};
var are = new RectangleE(4, 5);
console.log(are.area());   