let person = {firstName:"Marry", lastName:"Phillip", age:25, eyeColor:"blue"};
console.log(typeof(person));
var p1 = { name:"Cassy" }; 
console.log(typeof(p1));
//using new Operator
function Car(model, color) {
    this.model = model;
    this.color = color;
}
var c1 = new Car('BMW', 'red');
console.log(c1.model);
console.log(typeof(c1));
//using Object() constructor function
var p2 = new Object(); 
p2.name ="Cassy";
console.log(typeof(p2));
//using create() method in Object
var Car = {
    model: 'BMW',
    color: 'red'
}
var ElectricCar = Object.create(Car);
console.log(ElectricCar.model);
console.log(typeof(ElectricCar));
