const personA = { firstName: "Leilani",  lastName: "Hao",  language: "en",
  get lang() { return this.language;  }
};
//call getter 
console.log(personA.lang);
//practice setter.
const personB = { firstName: "Lily",  lastName: "Hua", language: "",
  	     set lang(lang) {
    		this.language = lang;
  	     }
	};
// Set an object property using a setter:
personB.lang ="jp";
//personB.lang('jp');
//show the result
console.log(personB);
