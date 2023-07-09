function check_error(
  input,
  options = {
    type: "input",
    verifyFlag: 0,
    condition: "NA",
    conditionCheck: "NA",
    regex: "NA",
    text: "Text",
    returnVal: "Value",
  }
) {
  const {
    type,
    verifyFlag,
    condition,
    conditionCheck,
    regex,
    text,
    returnVal,
  } = options;

  if (Array.isArray(input)) {
    if (verifyFlag === 1 && input[0] !== input[1]) {
      return handleMismatchError(input);
    } else if (returnVal === "Value") {
      return input[0].value;
    } else if (returnVal === "Text") {
      return input[0].text;
    }
  } else {
    if (input.value === "") {
      return handleEmptyError(input);
    } else {
      if (verifyFlag === 1) {
        if (type === "tel" || type === "number") {
          return handleNumberType(input, regex, text, conditionCheck);
        } else if (type === "date") {
          return handleDateType(input, condition, conditionCheck);
        } else {
          return handleDefaultType(input, regex, text);
        }
      } else {
        if (type == "select"){
            return returnVal === "Value" ? input.options[input.selectedIndex].value : input.options[input.selectedIndex].text;
        } else {
            return returnVal === "Value" ? input.value : input.text;
        }
      }
    }
  }
}

function handleMismatchError(input) {
  const [input1, input2] = input;
  const inputName1 = input1.name;
  const inputName2 = input2.name;

  if (input1.value === "" || input2.value === "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: `${inputName1} and ${inputName2} cannot be empty!`,
    }).then((result) => {
      if (result.isConfirmed) {
        input1.focus();
        input2.focus();
        
      }
    });
  } else if (input1.value !== input2.value) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: `${inputName1} and ${inputName2} do not match!`,
    }).then((result) => {
      if (result.isConfirmed) {
        input1.focus();
        input2.focus();
        
      }
    });
  } else {
    return input1.value;
  }
}

function handleEmptyError(input) {
  const inputName = input.name;

  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: `${inputName} cannot be empty!`,
  }).then((result) => {
    if (result.isConfirmed) {
      input.focus();
    }
  });
}

function handleNumberType(input, regex, text, conditionCheck) {
  if (isNaN(input.value)) {
    const inputName = input.name;

    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: `${inputName} must be a number!`,
    }).then((result) => {
      if (result.isConfirmed) {
        input.focus();
        
      }
    });
  } else if (regex !== "NA" && !input.value.match(regex)) {
    const inputName = input.name;

    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: `${inputName} does not match the required format! Please input a valid ${text}.`,
    }).then((result) => {
      if (result.isConfirmed) {
        input.focus();
        
      }
    });
  } else {
    if (conditionCheck === "contactNumber") {
      return "63" + input.value;
    } else {
      return input.value;
    }
  }
}

function handleDateType(input, condition, conditionCheck) {
  if (condition === "today") {
    if (conditionCheck === "birthdate") {
      const currentDate = new Date();
      const inputDate = new Date(input.value);

      const inputName = input.name;

      if (inputDate >= currentDate) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: `${inputName} cannot be a future date!`,
        }).then((result) => {
          if (result.isConfirmed) {
            input.focus();
            
          }
        });
      } else if (Math.floor((currentDate - inputDate) / 31557600000) < 14) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: `You must be at least 14 years old to register!`,
        }).then((result) => {
          if (result.isConfirmed) {
            input.focus();
            
          }
        });
      } else {
        return input.value;
      }
    } else {
      return input.value;
    }
  } 
}

function handleDefaultType(input, regex, text) {
  if (regex !== "NA" && !input.value.match(regex)) {
    const inputName = input.name;

    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: `${inputName} does not match the required format! Please input a valid ${text}.`,
    }).then((result) => {
      if (result.isConfirmed) {
        input.focus();
      }
    });
  } else {
    return input.value;
  }
}