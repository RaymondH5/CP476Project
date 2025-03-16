//more complicated example
var p1 = new Promise(function(resolve, reject) {
    let var1 = 1;
    if( var1 == 1)
    {
      resolve('Success');
    }
    else if(var1 == 2)
    {
      reject('error');
    }

  });
  p1.then(handleSuccess, handleReject);
  function handleSuccess(value){
    console.log(value); // "Success!"
  }
  function handleReject(error){
    console.log(error);
  }

