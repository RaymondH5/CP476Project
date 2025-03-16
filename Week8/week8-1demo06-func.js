//Invoking a Function as a Method of an object
const employee ={ 
    firstName: "Mike", 
    lastName: "Hay", 
    fullName: function(a, b) { return a+b; }  
}
let ret = employee.fullName(4,6);  
console.log(ret);
//Invoking a Function with a Function Constructor
// Create a function that takes two arguments, and returns the sum of those arguments
const adder = new Function('a', 'b', 'c=a + b; return c;');

// Call the function
let ret1 = adder(2, 6);
console.log(ret1);