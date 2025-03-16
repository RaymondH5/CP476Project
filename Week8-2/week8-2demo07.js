function myDisplayer(some) {
    console.log(some);
  }
  
  async function myFunction() {
    //let x = true;
    let x = false;
    if (x == true)
    {
      return "Hello";
    }
    else
    {
      return "Error";
    }

  }  
  myFunction().then(
    function(value) {myDisplayer(value);},
    function(error) {myDisplayer(error);}
  );