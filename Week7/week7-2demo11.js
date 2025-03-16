class Rectangle {  
	constructor(height, width) {    
		this.height = height;    
		this.width = width;  
	}   
	get area() {    //getter   
	      return this.height * this.width;  
	}
}
const square = new Rectangle(6, 6);
console.log(square.area);   // not square.area()
const language = {      
	set current(name) {    //setter
	      this.log.push(name);  
	},  
	log: []
};
language.current = 'en';
//language.current('en');
language.current = 'jp';
console.log(language.log);
