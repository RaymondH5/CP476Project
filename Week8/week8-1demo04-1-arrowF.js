function Fun1() {
    if (!new.target) {
      throw new Error("Fun1() must be called with new");
    }
    console.log("Fun1 instantiated with new");
  }
  
  new Fun1(); // Logs "Foo instantiated with new"
  Fun1(); // Throws "Foo() must be called with new"