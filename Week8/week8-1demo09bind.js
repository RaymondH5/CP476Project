let math ={
    multip:function(){
        return (this.var1*this.var2); 
    } 
}
let calcu ={
    var1: 4,
    var2: 6
}

//let res1 = math.multip.apply(calcu);  // apply()
//let res = math.multip.call(calcu);   // call()
let nameT = math.multip; // bind()
let bindT = nameT.bind(calcu);
let res = bindT();
console.log(res);