//callback function example.
function addition(a, b, callback) {
  let result=callback(a, b);
  console.log("The result is: " + result);
}
function addTo(a, b) {
  return a + b;
}
addition(6, 8, addTo);
console.log("callBack");

