console.log("ciao");

if (document.querySelector('#registerForm') !== null) {
    const form = document.querySelector('form')
    const checkSubmit = document.getElementById('checkSubmit')

    checkSubmit.addEventListener("click", function() {
        if (checkSubmit.checked) {
            document.getElementById('btnSub').disabled = false
        } else {
            document.getElementById('btnSub').disabled = true
        }
    });

    form.addEventListener("submit", (event) => {

        console.log("Ah yes, inizia la funzione");

        let valid = true
        let errors = [];
        const errorsMessage = ["<li>Nome troppo corto</li>", "<li>Nome troppo lungo</li>", "<li>Inserire solo lettere</li>", "<li>Cognome troppo corto</li>", "<li>Cognome troppo lungo</li>", "<li>Inserire solo Lettere</li>", "<li>Deve essere presente un numero civico</li>", "<li>Bisogna inserire almeno una tipologia</li>", "<li>Password troppo corta</li>", "<li>Le due Password non coincidono</li>", "<li>La Partita Iva è troppo corta</li>", "<li>I campi contrassegnati con l'asterisco sono obligatori</li>", "<li>La Partita IVA è troppo lunga</li>"]
        let checkdType = 0
        let inputNull = 0
        
        const name = document.getElementById("name").value;
        const lastname = document.getElementById("lastname").value;
        const address = document.getElementById("address").value;
        let types = document.querySelectorAll("input[type='checkbox']");
        const password = document.getElementById("password").value;
        const confPass = document.getElementById("password-confirm").value;
        const vat = document.getElementById("vat").value;
        const input = document.querySelectorAll("input");

        const nameAlert = document.getElementById("nameAlert");
        const lastnameAlert = document.getElementById("lastnameAlert");
        const addressAlert = document.getElementById("addressAlert");
        const typeAlert = document.getElementById("typeAlert");
        const passwordAlert = document.getElementById("passwordAlert");
        const confPassAlert = document.getElementById("confPassAlert");
        const pIvaAlert = document.getElementById("pIvaAlert");
        const inputAlert = document.getElementById("inputAlert");

        const regExpNameLastname = /[^a-zA-Z]/
        const regExpAddress = /\w*[0-9]$|sn$|snc$/

        types.forEach(type => {
            if (type.checked == false) {
                checkdType++
            }
        });

        input.forEach((inp, key) => {
            if (key <= 8) {
                if (inp.value == "") {
                    inputNull++
                }    
            }
            
        })

        // controllo sul nome
        if(name.length < 2) {
            errors.push(1)
            valid = false
        }
        if(name.length > 15) {
            errors.push(2)
            valid = false
        }
        if (regExpNameLastname.test(name) == true) {
            errors.push(3)
            valid = false
        }
        
        // controllo sul cognome
        if(lastname.length < 2) {
            errors.push(4)
            valid = false
        }
        if(lastname.length > 15) {
            errors.push(5)
            valid = false
        }
        if (regExpNameLastname.test(lastname) == true) {
            errors.push(6)
            valid = false
        }

        // controllo sull'indirizzo
        if(regExpAddress.test(address) == false) {
            errors.push(7)
            valid = false
        }

        // controllo types
        if(checkdType == 13){
            errors.push(8)
            valid = false
        }

        if (password.length < 7){
            errors.push(9)
            valid = false
        }
        if (confPass != password) {
            errors.push(10)
            valid = false
        }

        if (vat.length <= 10) {
            errors.push(11)
            valid = false
        }

        if (inputNull != 0) {
            errors.push(12)
            valid = false
        }

        if (vat.length >= 12){
            errors.push(13)
            valid = false
        }

        if (!valid) {
            event.preventDefault();
            console.log("Stop right there criminal scum");
            inputAlert.innerHTML = ""
            checkSubmit.checked = false
            document.getElementById('btnSub').disabled = true
            nameAlert.innerHTML = ""
            lastnameAlert.innerHTML = ""
            addressAlert.innerHTML = ""
            typeAlert.innerHTML = ""
            passwordAlert.innerHTML = ""
            confPassAlert.innerHTML = ""
            pIvaAlert.innerHTML = ""
            errors.forEach(error => {
                if (error == 1 || error == 2 || error == 3) {
                    nameAlert.innerHTML += errorsMessage[error - 1] 
                } else if (error == 4 || error == 5 || error == 6) {
                    lastnameAlert.innerHTML += errorsMessage[error - 1]
                } else if (error == 7) {
                    addressAlert.innerHTML = errorsMessage[error - 1]
                } else if (error == 8) {
                    typeAlert.innerHTML += errorsMessage[error - 1]
                } else if (error == 9) {
                    passwordAlert.innerHTML += errorsMessage[error - 1]
                } else if (error == 10) {
                    confPassAlert.innerHTML += errorsMessage[error - 1]
                } else if (error == 11) {
                    pIvaAlert.innerHTML += errorsMessage[error - 1]
                } else if (error == 12) {
                    inputAlert.innerHTML += errorsMessage[error - 1]
                } else if (error == 13) {
                    pIvaAlert.innerHTML += errorsMessage[error - 1]
                }
            });
        }
    })    
}

// if (document.querySelector('#formEditLogin') !== null) {

//     form.addEventListener("submit", (event) => {

//         let valid = true
//         let errors = [];
//         const errorsMessage = ["<li>Nome troppo corto</li>", "<li>Nome troppo lungo</li>", "<li>Inserire solo lettere</li>", "<li>Cognome troppo corto</li>", "<li>Cognome troppo lungo</li>", "<li>Inserire solo Lettere</li>", "<li>Deve essere presente un numero civico</li>", "<li>Bisogna inserire almeno una tipologia</li>", "<li>Password troppo corta</li>", "<li>Le due Password non coincidono</li>", "<li>La Partita Iva è troppo corta</li>", "<li>I campi contrassegnati con l'asterisco sono obligatori</li>", "<li>La Partita IVA è troppo lunga</li>"]
        

//         const name = document.getElementById("name").value;
//         const ingredients = document.getElementById("ingredients").value;
//         const price = document.getElementById("price").value;
//         const visibility = document.getElementById("visibility").value;

//         const nameAlert = document.getElementById("nameAlert").value;
//         const ingredientsAlert = document.getElementById("ingredientsAlert").value;
//         const priceAlert = document.getElementById("priceAlert").value;
//         const visibilityAlert = document.getElementById("visibilityAlert").value;

//         if (name.length >=51) {
//             errors.push(1)
//             valid = false
//         }

//         if(visibility.value == ""){
//             errors.push(2)
//             valid = false
//         }

//         if (!valid) {
//             event.preventDefault();
//             console.log("Stop right there criminal scum");
//             inputAlert.innerHTML = ""
//             nameAlert.innerHTML = ""
//             ingredientsAlert.innerHTML = ""
//             priceAlert.innerHTML = ""
//             visibilityAlert.innerHTML = ""
//             errors.forEach(error => {
//                 if (error == 1) {
                    
//                 }
//             });
//         }
//     })
// }