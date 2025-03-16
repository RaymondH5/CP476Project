FunName1("Marry");
// function declaration
function FunName1( name ) {
    this.name1 = name;
    console.log( "Hello" + ' '+ this.name1 );
  };
sayHi("Mike");
//function expression
let sayHi = function FunName2(name) {
    this.name2 = name;
        console.log( "Hello" + ' ' + this.name2 );
    }; 
//sayHi('Mike');