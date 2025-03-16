class CP476_student {
  #name;
  constructor(name) {
    this.#name = name;
  }
  getName() {
    return this.#name;
  }
  setName(newName) {
    this.#name = newName;
  }
}
  const student = new CP476_student('John Smith');
  console.log(student.getName()); // outputs ‘John Smith’
  student.setName('Mary Smith');
  console.log(student.getName()); // outputs ‘Mary Smith’