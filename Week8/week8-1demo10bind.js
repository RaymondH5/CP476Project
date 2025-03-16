const moduleX = {
    x:26,
    getX: function() {
      return this.x;
    }
  };
  
  const unboundGetX = moduleX.getX;
  console.log(unboundGetX()); // The function gets invoked at the global scope
  //const unboundGetX = moduleX.getX();
  //console.log(unboundGetX); // The function gets invoked at the global scope
  // expected output: undefined
  
  const boundGetX = unboundGetX.bind(moduleX);
  console.log(boundGetX());
  // expected output: 26