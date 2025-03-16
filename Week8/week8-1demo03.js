//call the function 
var ret = myFunction(5);
console.log(ret);
//function declaration
function myFunction(y) {
    return y * y;
}
//call the function
var retEx = myFunctionEx(5);
console.log(retEx);
//function expression
var myFunctionEx = function(x){
    return x*x;
};

