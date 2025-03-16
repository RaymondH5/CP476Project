// variable identifier let
function week7_demo02(){
    // Variables defined with let cannot be Redeclared
    var  x= "Lunshan";
    var  x= "Shaun"; 
    console.log("OK?");
    //Variables defined with let must be Declared before use
    try{
        //carName = "Saab";
        let carName = "Volvo";
        console.log("OK?");
    }
    catch(error){
        console.log(error); 
    }
}
week7_demo02();
