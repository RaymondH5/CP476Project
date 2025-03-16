function run(){
    var foo ="Foo";
    let bar ="bar";
    console.log(foo, bar);
    {
        var moo = "Mooo";
        let baz = "Bazz";
        console.log(moo, baz);
        console.log(bar);
    }
    console.log(moo);
    console.log(baz); // baz is not defined error
}
run();