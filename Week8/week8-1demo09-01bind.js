var x=9;    // 'this' refers to global 'window' object here in a browser
const moduleX = 
{
  x: 81,
  getX: function() { return this.x; }
};
var ret =moduleX.getX();
//  returns 81
console.log(ret);
const retrieveX = moduleX.getX;
let p1 = retrieveX();
console.log(p1);
//  returns undefined; the function gets invoked at the global scope
//  Create a new function with 'this' bound to module
//  New programmers might confuse the
//  global variable 'x' with module's property 'x'
const boundGetX = retrieveX.bind(moduleX);
let p2 =boundGetX();
console.log(p2);
//---------------------
