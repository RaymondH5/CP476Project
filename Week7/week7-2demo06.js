//create an object with a mothod
const person = {
    firstName: "Leilani",   lastName: "Hao",  age: 24,
    fullName:function() {
       return this.firstName + " " + this.lastName;  
    }
};
//call the method in an object
let name1 = person.fullName();
//display the name
console.log(name1);
