//# indicate private member
class ClassWithPrivateAccessor {
    #message;    // private variable
    get #decoratedMessage() {
      return `🎬${this.#message}🛑`;
    }
    set #decoratedMessage(msg) {
      this.#message = msg;
    }
    constructor(str1) {
      this.#decoratedMessage = 'hello world';
      //this.#decoratedMessage = str1;         
      console.log(this.#decoratedMessage);
    }
  }
  let obj1 = new ClassWithPrivateAccessor("hello world");
   