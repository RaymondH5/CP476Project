// Traditional Anonymous Function
var anony = function (a) {
  return a + 100;
}
console.log(anony(9));
// Arrow Function Break Down
// 1. Remove the word "function" and place arrow between the argument and opening body bracket
(a) => {
  return a + 100;
}
// 2. Remove the body braces and word "return" -- the return is implied.
(a) => a + 100;
let arro1 = (a) => a + 100;
console.log(arro1(9));
// 3. Remove the argument parentheses
a => a + 100;
let arro = a => a + 100;
console.log(arro(9));
//------------------------
// Traditional Anonymous Function
let anony2 = function (a, b) {
  return a + b + 100;
}
console.log(anony2(6, 9));
// Arrow Function
let arro2 = (a, b) => a + b + 100;
console.log(arro2(6, 9));
// Traditional Anonymous Function (no arguments)
let a1 = 4;
let b1 = 2;
let anony3 = function () {
  return a1 + b1 + 100;
}
console.log(anony3());
// Arrow Function (no arguments)
let a = 4;
let b = 2;
() => a + b + 100;
let arro3 = () => a + b + 100;
console.log(arro3(6, 9));
//console.log(arro3);
let arro4 = (a, b) => a + b + 100;
console.log(arro4(6, 9));
