const fname = document.getElementById("fname");
const occupation = document.getElementById("occupation");
const email = document.getElementById("email");
const tel = document.getElementById("tel");
const address = document.getElementById("address");
const city = document.getElementById("city");
const country = document.getElementById("country");
const website = document.getElementById("website");
const facebook = document.getElementById("facebook");
const twitter = document.getElementById("twitter");
const linkedin = document.getElementById("linkedin");

const letterdate = document.getElementById("letterdate");
const recipient = document.getElementById("recipient");
const company = document.getElementById("company");
const companyaddress = document.getElementById("companyaddress");
const ref = document.getElementById("ref");
const coverbody = document.getElementById("coverbody");

const cfullname = document.getElementById("cfullname");
const coccupation = document.getElementById("coccupation");

const cemail = document.getElementById("cemail");
const ctel = document.getElementById("ctel");
const caddress = document.getElementById("caddress");
const ccity = document.getElementById("ccity");
const ccountry = document.getElementById("ccountry");

const cwebsite = document.getElementById("cwebsite");
const cfacebook = document.getElementById("cfacebook");
const ctwitter = document.getElementById("ctwitter");
const clinkedin = document.getElementById("clinkedin");

const cdate = document.getElementById("cdate");
const crecipient = document.getElementById("crecipient");
const ccompany = document.getElementById("ccompany");
const ccomaddress = document.getElementById("ccomaddress");
const cref = document.getElementById("cref");
const cbody = document.getElementById("cbody");

cbody.innerHTML = coverbody.value;

/*function fillcover(){
    cfullname.innerHTML = fname.value;
    coccupation.innerHTML = occupation.value;
    crecipient.innerHTML = recipient.value;
    ccompany.innerHTML = company.value;
    caomaddress.innerHTML = companyaddress.value;
    cbody.innerHTML = coverbody.value;
}*/


fname.addEventListener('keyup', function(){cfullname.innerHTML = fname.value;});
occupation.addEventListener('keyup', function(){coccupation.innerHTML = occupation.value;});

email.addEventListener('keyup', function(){if(email.value==""){cemail.style.display="none";}else{cemail.style.display="block"; cemail.innerHTML = email.value}});
tel.addEventListener('keyup', function(){if(tel.value==""){ctel.style.display="none";}else{ctel.style.display="block"; ctel.innerHTML=tel.value}});
address.addEventListener('keyup', function(){if(address.value==""){caddress.style.display="none";}else{caddress.style.display="block"; caddress.innerHTML=address.value}});
city.addEventListener('keyup', function(){if(city.value==""){ccity.style.display="none";}else{ccity.style.display="block"; ccity.innerHTML=city.value}});
country.addEventListener('keyup', function(){if(country.value==""){ccountry.style.display="none";}else{ccountry.style.display="block"; ccountry.innerHTML=country.value}});


website.addEventListener('change', function(){if(website.value==""){cwebsite.style.display="none";}else{cwebsite.style.display="block"; cwebsite.innerHTML= "<i class='fa-solid fa-earth-africa'></i> "+website.value;}});
facebook.addEventListener('change', function(){if(facebook.value==""){cfacebook.style.display="none";}else{cfacebook.style.display="block";cfacebook.innerHTML= "<i class='fa-brands fa-facebook'></i> "+facebook.value}});
twitter.addEventListener('change', function(){if(twitter.value==""){ctwitter.style.display="none";}else{ctwitter.style.display="block";ctwitter.innerHTML= "<i class='fa-brands fa-twitter'></i> "+twitter.value}});
linkedin.addEventListener('change', function(){if(linkedin.value==""){clinkedin.style.display="none";}else{clinkedin.style.display="block";clinkedin.innerHTML= "<i class='fa-brands fa-linkedin'></i> "+linkedin.value}});


letterdate.addEventListener('change', function(){cdate.innerHTML = letterdate.value;});
recipient.addEventListener('keyup', function(){crecipient.innerHTML = recipient.value;});
company.addEventListener('keyup', function(){ccompany.innerHTML = company.value;});
companyaddress.addEventListener('keyup', function(){ccomaddress.innerHTML = companyaddress.value;});
ref.addEventListener('keyup', function(){if(ref.value==""){cref.style.display="none"}else{ cref.style.display="block"; cref.innerHTML = "<h4><u>REF: "+ref.value+"</u></h4><br />";}});
coverbody.addEventListener('keyup', function(){cbody.innerHTML = coverbody.value;});

    tinymce.init({
        selector: "#coverbody",
        setup : function(ed) {
            ed.on("keyup", function(){
                $(cbody).html(tinymce.activeEditor.getContent());
            });
    }
});


var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var clbx = document.getElementById("clbx");

btn.onclick = function() {
    modal.innerHTML = clbx.innerHTML;
    modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}