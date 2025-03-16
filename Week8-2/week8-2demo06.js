function first() {
    setTimeout(function() {
        console.log('first');
    }, 100);
}

function second() {
    console.log('second');
}
first();
second();