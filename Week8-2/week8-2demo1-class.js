class Animal {
  makeSound() {
    console.log("Some generic sound");
  }
}
class Dog extends Animal {
  makeSound() {
    console.log("Bark!");
  }
}
class Cat extends Animal {
  makeSound() {
    console.log("Meow!");
  }
}
const dog = new Dog();
const cat = new Cat();

dog.makeSound(); // Outputs: "Bark!"
cat.makeSound(); // Outputs: "Meow!"