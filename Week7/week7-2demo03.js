var myCar = new Object();
myCar.make = 'Honda';
myCar.model = 'HRV';
myCar.year = 2019;
myCar.color = 'red';
console.log(myCar); 
//
var myCar1 = {
    make: 'Honda',
    model: 'HRV',
    year: 2019,
    color: 'red'
  };
console.log(myCar1);  
//
var myCar2 = new Object();
myCar2['make'] = 'Honda';
myCar2['model'] = 'HRV';
myCar2['year'] = 2019;
myCar2['color'] ='red';
console.log(myCar2); 

const person = {
  isHuman: false,
  sizeH: 0,
};

const me = Object.create(person);

me.name = 'Matthew'; // "name" is a property set on "me", but not on "person"
me.isHuman = true;
me.sizeH = '169cm';
me.sizeW = '60kg';
console.log(typeof(me)); 