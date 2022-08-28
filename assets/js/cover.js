
const fname = document.getElementById("fname");
const occupation = document.getElementById("occupation");
const email = document.getElementById("email");
const tel = document.getElementById("tel");
const caddressbx = document.getElementById("caddressbx");
const address = document.getElementById("address");
const postalcode = document.getElementById("postalcode");
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
const companycity = document.getElementById("companycity");
const companycountry = document.getElementById("companycountry");

const ref = document.getElementById("ref");
const coverbody = document.getElementById("coverbody");

const cfullname = document.getElementById("cfullname");
const coccupation = document.getElementById("coccupation");

const cemail = document.getElementById("cemail");
const ctel = document.getElementById("ctel");
const caddress = document.getElementById("caddress");
const cpostalcode = document.getElementById("cpostalcode");
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
const ccomcity = document.getElementById("ccomcity");
const ccomountry = document.getElementById("ccomountry");

const cref = document.getElementById("cref");
const cbody = document.getElementById("cbody");

cbody.innerHTML = coverbody.value;

window.addEventListener('load', function(){cfullname.innerHTML = fname.value;});
fname.addEventListener('keyup', function(){cfullname.innerHTML = fname.value;});

window.addEventListener('load', function(){coccupation.innerHTML = occupation.value;});
occupation.addEventListener('keyup', function(){coccupation.innerHTML = occupation.value;});

window.addEventListener('load', function(){if(email.value==""){cemail.style.display="none";}else{cemail.style.display="block"; cemail.innerHTML = email.value}});
email.addEventListener('keyup', function(){if(email.value==""){cemail.style.display="none";}else{cemail.style.display="block"; cemail.innerHTML = email.value}});

window.addEventListener('load', function(){if(tel.value==""){ctel.style.display="none";}else{ctel.style.display="block"; ctel.innerHTML=tel.value}});
tel.addEventListener('keyup', function(){if(tel.value==""){ctel.style.display="none";}else{ctel.style.display="block"; ctel.innerHTML=tel.value}});

window.addEventListener('load', function(){if(address.value==""){caddressbx.style.display="none";}else{caddressbx.style.display="block"; caddress.innerHTML=address.value}});
address.addEventListener('keyup', function(){if(address.value==""){caddressbx.style.display="none";}else{caddressbx.style.display="block"; caddress.innerHTML=address.value}});

window.addEventListener('load', function(){if(postalcode.value==""){cpostalcode.style.display="none";}else{cpostalcode.style.display="block"; cpostalcode.innerHTML="-"+postalcode.value}});
postalcode.addEventListener('keyup', function(){if(postalcode.value==""){cpostalcode.style.display="none";}else{cpostalcode.style.display="block"; cpostalcode.innerHTML="-"+postalcode.value}});

window.addEventListener('load', function(){if(city.value==""){ccity.style.display="none";}else{ccity.style.display="block"; ccity.innerHTML=city.value}});
city.addEventListener('keyup', function(){if(city.value==""){ccity.style.display="none";}else{ccity.style.display="block"; ccity.innerHTML=city.value}});

window.addEventListener('load', function(){if(country.value==""){ccountry.style.display="none";}else{ccountry.style.display="block"; ccountry.innerHTML=country.value}});
country.addEventListener('keyup', function(){if(country.value==""){ccountry.style.display="none";}else{ccountry.style.display="block"; ccountry.innerHTML=country.value}});

window.addEventListener('load', function(){if(website.value==""){cwebsite.style.display="none";}else{cwebsite.style.display="block"; cwebsite.innerHTML= "<i class='fa-solid fa-earth-africa'></i> "+website.value;}});
website.addEventListener('change', function(){if(website.value==""){cwebsite.style.display="none";}else{cwebsite.style.display="block"; cwebsite.innerHTML= "<i class='fa-solid fa-earth-africa'></i> "+website.value;}});

window.addEventListener('load', function(){if(facebook.value==""){cfacebook.style.display="none";}else{cfacebook.style.display="block";cfacebook.innerHTML= "<i class='fa-brands fa-facebook'></i> "+facebook.value}});
facebook.addEventListener('change', function(){if(facebook.value==""){cfacebook.style.display="none";}else{cfacebook.style.display="block";cfacebook.innerHTML= "<i class='fa-brands fa-facebook'></i> "+facebook.value}});

window.addEventListener('load', function(){if(twitter.value==""){ctwitter.style.display="none";}else{ctwitter.style.display="block";ctwitter.innerHTML= "<i class='fa-brands fa-twitter'></i> "+twitter.value}});
twitter.addEventListener('change', function(){if(twitter.value==""){ctwitter.style.display="none";}else{ctwitter.style.display="block";ctwitter.innerHTML= "<i class='fa-brands fa-twitter'></i> "+twitter.value}});

window.addEventListener('load', function(){if(linkedin.value==""){clinkedin.style.display="none";}else{clinkedin.style.display="block";clinkedin.innerHTML= "<i class='fa-brands fa-linkedin'></i> "+linkedin.value}});
linkedin.addEventListener('change', function(){if(linkedin.value==""){clinkedin.style.display="none";}else{clinkedin.style.display="block";clinkedin.innerHTML= "<i class='fa-brands fa-linkedin'></i> "+linkedin.value}});

window.addEventListener('load', function(){cdate.innerHTML = letterdate.value;});
letterdate.addEventListener('change', function(){cdate.innerHTML = letterdate.value;});

window.addEventListener('load', function(){crecipient.innerHTML = recipient.value+"<br />";});
recipient.addEventListener('keyup', function(){crecipient.innerHTML = recipient.value+"<br />";});

window.addEventListener('load', function(){ccompany.innerHTML = company.value+"<br />";});
company.addEventListener('keyup', function(){ccompany.innerHTML = company.value+"<br />";});

window.addEventListener('load', function(){ccomaddress.innerHTML = companyaddress.value+"<br />";});
companyaddress.addEventListener('keyup', function(){ccomaddress.innerHTML = companyaddress.value+"<br />";});

window.addEventListener('load', function(){if(companycity.value==""){ccomcity.style.display="none";}else{ccomcity.style.display="block"; ccomcity.innerHTML = companycity.value+"<br />";}});
companycity.addEventListener('keyup', function(){if(companycity.value==""){ccomcity.style.display="none";}else{ccomcity.style.display="block"; ccomcity.innerHTML = companycity.value+"<br />";}});

window.addEventListener('load', function(){if(companycountry.value==""){ccomountry.style.display="none";}else{ccomountry.style.display="block"; ccomountry.innerHTML = companycountry.value+"<br />";}});
companycountry.addEventListener('keyup', function(){if(companycountry.value==""){ccomountry.style.display="none";}else{ccomountry.style.display="block"; ccomountry.innerHTML = companycountry.value+"<br />";}});

window.addEventListener('load', function(){if(ref.value==""){cref.style.display="none"}else{ cref.style.display="block"; cref.innerHTML = "<h4><u>REF: "+ref.value+"</u></h4><br />";}});
ref.addEventListener('keyup', function(){if(ref.value==""){cref.style.display="none"}else{ cref.style.display="block"; cref.innerHTML = "<h4><u>REF: "+ref.value+"</u></h4><br />";}});


coverbody.addEventListener('keyup', function(){cbody.innerHTML = coverbody.value;});

    tinymce.init({
        selector: "#coverbody",
        add_form_submit_trigger : true,
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

function gettemp(e){
  const clbx = document.getElementById("clbx");
  const tempname = e.getAttribute("rec");
  const url ="manage/cover_views/"+tempname+".php";
  
  fetch(url)
  .then(response=> response.text())
  .then(text=> clbx.innerHTML = text);
}

  