
const form=document.getElementById('form');
const ime=document.getElementById('ime');
const mejl=document.getElementById('mejl');
const sifra=document.getElementById('sifra');
const sifra2=document.getElementById('sifra2');
const staraSifra=document.getElementById('staraSifra');

const naslov=document.getElementById('naslov');
const sadrzaj=document.getElementById('sadrzaj');

const isValidEmail=mejl=>{
    const rgx=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return rgx.test(String(mejl).toLowerCase());
}
const isValidPassword=sifra=>{
    const rgx=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\w\W]{8,}$/;
    return rgx.test(String(sifra));
}
const isValidName=ime=>{
    const rgx=/^([a-zA-Z0-9]+)$/
    return rgx.test(String(ime));
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

const proveriIzmene=()=>{
    const key=window.location.search;
    const urlParams=new URLSearchParams(key);
    const param=urlParams.get('error');

    if(param=="ZauzetoIme"){
        setError(ime,"Korisnicko ime je zauzeto!");
        ime.scrollIntoView();
    }
    else if(param=="PogresnaSifra"){
        setError(staraSifra,"Lozinka nije tacna!");
        staraSifra.scrollIntoView();
    }
    else if(param=="imeUspesno"){
        $('#nameSucces').modal('show');
    }
    else if(param=="UspesnoPromenjenaSifra"){
        $('#passSucces').modal('show');
    }

}

const proveriDostupnost=()=>{
    const key=window.location.search;
    const urlParams=new URLSearchParams(key);
    const param=urlParams.get('error');
    if(param=="ZauzetoIme")
    {
        setError(ime,'Korisnicko ime je zauzeto!');
        
    }
    else if(param=="ZauzetMejl")
    {
        setError(mejl,'Vec ste registrovani sa ovim e-mailom!');
      
    }
  
}
const proveriKorisnika=()=>{
    const key=window.location.search;
    const urlParams=new URLSearchParams(key);
    const param=urlParams.get('error');
    if(param=="KorisnikNijePronadjen"){
        setError(ime,"Korisnik nije pronadjen");
        return false;
    }
    else if(param=="PogresnaSifra"){
        setError(sifra,"Pogresna lozinka");
        return false;
    }
    
}

const proveriIzmenuIme=()=>{
    const imeV=ime.value.trim();
    if(imeV==''){
        setError(ime,"Ime ne moze biti prazno!");
        return false;
    }
    else if(!isValidName(imeV)){
        setError(ime,"Ime moze da sadrzi samo slova i brojeve!");
        return false;
    }
    else {
        setSucces(ime);
      
    }
    
}
const proveriIzmenuSifra=()=>{
    const sifraV=sifra.value.trim();
    const sifraV2=sifra2.value.trim();
    const staraSifraV=staraSifra.value.trim();

if(staraSifraV===''){
    setError(staraSifra,"Ovo polje je obavezno!");
    return false;
}
else {
    setSucces(staraSifra);
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

   if(sifraV!==sifraV2){
        setError(sifra2,"Lozinke se ne poklapaju!");
        return false;
    }
    else {
        setSucces(sifra2);
    }
  
}
const proveriPrijavu=()=>{
    const imeV = ime.value.trim();
    const sifraV= sifra.value.trim();
   
    if(imeV==''){
        setError(ime,"Unesite ime ili e-mail!");
        return false;
    }
    else{
        setSucces(ime);
        
    }   
     if(sifraV==''){
        setError(sifra,"Ovo polje je obavezno!");
        return false;
    }
    else {
        setSucces(sifra);
    }


}
const proveriObjavu=()=>{
    const naslovV=naslov.value.trim();
    const sadrzajV=sadrzaj.value.trim();

    if(naslovV==''){
        setError(naslov,"Objava mora da poseduje naslov!");
        return false;
    }
    else if(naslovV.length>30){
        setError(naslov,"Naslov ne moze biti duzi od 30 karaktera");
        return false;
    }
    else {
        setSucces(naslov);
    }
    if(sadrzajV==''){
        setError(sadrzaj,"Objava mora da ima sadrzaj!");
        return false;
    }
    else {
        setSucces(sadrzaj);
    }
}
const proveriRegistraciju = () => {
    const imeV = ime.value.trim();
    const mejlV= mejl.value.trim();
    const sifraV= sifra.value.trim();
    const sifra2V= sifra2.value.trim();
    if(imeV === '')
    {
        setError(ime,"Korisnicko ime je obavezno!");
        return false;
    }
    else if(!isValidName(imeV)){
        setError(ime,'Ime moze da sadrzi samo slova i brojeve!');
        return false;
    }
    else if(imeV.length>20){
        setError(ime,"Ime ne moze biti duze od 20 karaktera!");
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
    else if(mejlV.length>254){
        setError(mejl,"Maksimalna duzina e-mail adrese je 254!");
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
    else if(sifraV.length>50){
        setError(sifra,"Sifra ne moze biti duza od 50 karaktera!");
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

