
const form=document.getElementById('form');
const ime=document.getElementById('ime');
const mejl=document.getElementById('mejl');
const sifra=document.getElementById('sifra');
const sifra2=document.getElementById('sifra2');

// form.addEventListener('submit', e => {
//     e.preventDefault();
    
//     validateInputs();
   
// });

const isValidEmail=mejl=>{
    const rgx=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return rgx.test(String(mejl).toLowerCase());
}
const isValidPassword=sifra=>{
    const rgx=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    return rgx.test(String(sifra));
}

const setError=(element, message)=>{
    const inputControl=element.parentElement;
    const errorDisplay=inputControl.querySelector('.error');

    errorDisplay.innerText=message;
    inputControl.classList.add('error');
    inputControl.classList.remove('succes');
}
const setSucces = element=>{
    const inputControl=element.parentElement;
    const errorDisplay=inputControl.querySelector('.error');

    errorDisplay.innerText='';
    inputControl.classList.add('succes');
    inputControl.classList.remove('error');
};
const validateInputs = () => {
    const imeV = ime.value.trim();
    const mejlV= mejl.value.trim();
    const sifraV= sifra.value.trim();
    const sifra2V= sifra2.value.trim();

    if(imeV === '')
    {
        setError(ime,"Korisnicko ime je obavezno!");
        return false;
    }
    else
    {
        setSucces(ime);
    }
    if(mejlV==='')
    {
        setError(mejl,'E-mail je obavezan!');
        return false;
    }
    else if(!isValidEmail(mejlV))
    {
        setError(mejl,"Neispravan e-mail");
        return false;
    }
    else 
    {
        setSucces(mejl);
    }

    if(sifraV==='')
    {
        setError(sifra,'Sifra je obavezna!');
        return false;
    }
    else if(!isValidPassword(sifraV)){
        setError(sifra,'Sifra mora da sadrzi 8 karaktera minimalno, veliko, malo slovo i broj!');
        return false;
    }
    else
    {
        setSucces(sifra);
    }
    if(sifraV != sifra2V){
        setError(sifra2,'Lozinke se ne poklapaju!');
        return false;
    }
    else 
    {
        setSucces(sifra2);
    }
    if(sifra2V===''){
        setError(sifra2,'Ponovite sifru!');
        return false;
    }
    else{
        setSucces(sifra2);
    }
     
    

    

};

