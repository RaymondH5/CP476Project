//call method in function objects
const personX = {
    fullName: function() {
    	return this.firstName + " " + this.lastName;
  }
}
const personX1 = {
    firstName:"John",
    lastName: "Doe"
}
personX.fullName.call(personX1); 
let p1 = personX.fullName.call(personX1);
let p9 = personX.fullName(personX1);
console.log(p1);
console.log(p9);
//function call with arguments
const person = {
    fullName: function(city, country) {
      return this.firstName + " " + this.lastName + "," + city + "," + country;
    }
  }
  const person1 = {
    firstName:"John",
    lastName: "Doe"
  }
  let p2 =person.fullName.call(person1, "Oslo", "Norway");
  console.log(p2);
