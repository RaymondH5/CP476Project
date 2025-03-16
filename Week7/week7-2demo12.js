//object contructer
function PersonA(first, last, age, eye) {
    this.firstName = first;
    this.lastName = last;
    this.age = age;
    this.eyeColor = eye;
}
PersonA.nationality = "USA";   // will not work
console.log(PersonA);
const myFriendA = new PersonA("Jason", "Hua", 24, "gray");
//invalid 
myFriendA.nationality = "English";   // OK.
console.log(myFriendA);
