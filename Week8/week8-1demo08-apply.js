//apply() method in function objects
const person = {
	fullName: function() {
    		return this.firstName + " " + this.lastName;
  	}
}
const person1 = {
	firstName: "Mary",
	lastName: "Doe"
}
//person.fullName.apply(person1); 
let p1 = person.fullName.apply(person1);
console.log(p1);

//apply() with arguments
const personY = {
	fullName: function(city, country) {
    	return this.firstName + " " + this.lastName + "," + city + "," + country;
  }
}
const personY1 = {
  	firstName:"Mary",
  	lastName: "Doe"
}
let p2 =personY.fullName.apply(personY1, ["Oslo", "Norway"]);
console.log(p2);
// cannot pass object without call or apply
let p3 =personY.fullName(personY1, ["Oslo", "Norway"]);
console.log(p3);