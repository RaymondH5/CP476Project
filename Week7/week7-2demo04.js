const myObj = new Object(),
      str = 'myString',
      rand = Math.random(),
      obj = new Object();

myObj.type              = 'Dot syntax\n';
myObj['date created']   = 'String with space\n';
//myObj.date created   = 'String with space\n';
myObj[str]              = 'String value\n';
myObj.str              = 'String value\n';
myObj[rand]             = 'Random Number\n';
myObj.rand             = 'Random Number\n';
myObj[obj]              = 'Object\n';
myObj['']               = 'Even an empty string\n';
console.log(myObj);