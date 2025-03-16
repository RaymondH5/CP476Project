let sym1 = Symbol();
console.log(typeof(sym1));
var tf = (Symbol('foo') === Symbol('foo'));
console.log(tf);
//symbole and object
let sym = Symbol('foo');
console.log(typeof(sym));      // "symbol"
let symObj = Object(sym)
console.log(typeof(symObj));   // "object"