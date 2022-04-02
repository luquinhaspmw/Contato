
// ---------------------------------formulario contato-----------------------

// ======função empyt===========
const empyt = (input)=>{
    return input.value.length == 0 ? true : false;
}

// =-=-=-=-=-=-=-=-=-=-=validar numero==-=-=-=-=-=-=-=-=-=-=-=

// =============input de phone=========
const inputPhone = document.getElementById("phone");

// ======================evento de verificação empyt===================
inputPhone.addEventListener("blur",()=>{
    if(empyt(inputPhone)){
        inputPhone.classList.add("input-empyt");
    }else{
        inputPhone.classList.remove("input-empyt");
    }
})

// ==============função de validação================
const validarNum = num=>{
    const regexNum = new RegExp('^((1[1-9])|([2-9][0-9]))((3[0-9]{3}[0-9]{4})|(9[0-9]{3}[0-9]{5}))$'); 
    return regexNum.test(num);
}

// =========================evento de validação=========
inputPhone.addEventListener("input",()=>{
    if(inputPhone.value.length === 11){
        let result =  validarNum(inputPhone.value);
        if(result === true){
            inputPhone.classList.remove("input-empyt");
            inputPhone.setAttribute("data-js","true");
        }else{
            alert(`Número invalido: ${inputPhone.value} \nDigite dessa forma: 63912345678`);
            inputPhone.setAttribute("data-js","false");
            inputPhone.classList.add("input-empyt")
        }
    }
})


// =-=-=-=-=-=-=-=-=-=-validar nome=-=-=-=-=-=-=-=-=-=-

// =============input de nome=========
const inputNome = document.getElementById("nome");
// ======================evento de verificação empyt===================
inputNome.addEventListener("blur",()=>{
    if(empyt(inputNome)){
        inputNome.classList.add("input-empyt")
        inputNome.setAttribute("data-js","false");
    }else{
        inputNome.classList.remove("input-empyt")
        inputNome.setAttribute("data-js","true");
    }
})



// =-=-=-=-=-=-=-=-=-=-validar email=-=-=-=-=-=-=-=-=-=-

// =====================função de validação==================
const validateEmail = (email)=>{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
const falseEmail = ()=>{
    inputEmail.classList.add("input-empyt");
    inputEmail.setAttribute("data-js","false")
}
// =============input de email=========
const inputEmail = document.getElementById("email");
// ======================evento de verificação empyt===================
inputEmail.addEventListener("blur",()=>{
    if(empyt(inputEmail)){
        inputEmail.classList.add("input-empyt")
    }else{
        inputEmail.classList.remove("input-empyt");
        validateEmail(inputEmail.value) == true ? inputEmail.setAttribute("data-js","true") : falseEmail();
    }
})

// =-=-=-=-=-=-=-=-==-=- Botão submit =-=-=-=-=-=-=
 
let msg = document.getElementById("msg");
const mensagem = text=>{
    msg.innerHTML = text;
}
const validaEnvio = ()=>{
    const inputs = [inputNome.getAttribute("data-js"),inputEmail.getAttribute("data-js"),inputPhone.getAttribute("data-js")];
    let result = true;
    inputs.forEach(input=>{
         if(input == "false"){
             result = false;
         }
    })
    return result;
}
// ==================input de email================
const inputSubmit = document.getElementById("submitContato");

// ================ evento de verificação ===============
const erroSubmit = ()=>{
    e.preventDefault();
    alert("Preencha corretamente.");
} 
inputSubmit.addEventListener("click",(e)=>{
    if(validaEnvio()){
        mensagem("Em breve entraremos em contato. &#x1F609");
    }else{
        mensagem("Por favor, preencha os campos obrigatórios. &#x1F643");
        e.preventDefault();
    }
})


