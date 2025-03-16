//arguments.length property
function myFunction(a, b) {
    return arguments.length;
}
let ret1 = myFunction(3, 9);
console.log(ret1);
//toString() method 
function myFunct(a, b) {
    return a * b;
}
let text = myFunct.toString();
console.log(text);
console.log(typeof(text));
//--------------------------
//another arguments.length()
x = sumAll(1, 3, 5, 7, 9, 11);
function sumAll() {
  	let sum = 0;
  	for (let i = 0; i < arguments.length; i++) {
    		sum += arguments[i];
  	}
  return sum;
}
console.log(x);
//arrow function
const materials = [
    'Hydrogen',
    'Helium',
    'Lithium',
    'Beryllium'
  ];
  console.log(materials.map(material => material.length));
  console.log(typeof(materials));