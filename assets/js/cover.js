const fname = document.getElementById("fname");
const occupation = document.getElementById("occupation");
const email = document.getElementById("email");
const city = document.getElementById("city");
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
const cpersonalinfo = document.getElementById("cpersonalinfo");

const cdate = document.getElementById("cdate");
const crecipient = document.getElementById("crecipient");
const ccompany = document.getElementById("ccompany");
const ccomaddress = document.getElementById("ccomaddress");
const cref = document.getElementById("cref");
const cbody = document.getElementById("cbody");

cbody.innerHTML = coverbody.value;

/*function fillcover(){
    caddress.innerHTML = address.value;
    cdate.innerHTML = letterdate.value;
    crecipient.innerHTML = recipient.value;
    ccompany.innerHTML = company.value;
    caomaddress.innerHTML = companyaddress.value;
    cbody.innerHTML = coverbody.value;
};*/


fname.addEventListener('keyup', function(){cfullname.innerHTML = fname.value;});
occupation.addEventListener('keyup', function(){coccupation.innerHTML = occupation.value;});
email.addEventListener('change', function(){cpersonalinfo.append(email.value+"  ")});
city.addEventListener('change', function(){cpersonalinfo.append(city.value+"  ")});
website.addEventListener('change', function(){cpersonalinfo.append("Website: "+website.value+"  ")});
facebook.addEventListener('change', function(){cpersonalinfo.append("Facebook: "+facebook.value+"  ")});
twitter.addEventListener('change', function(){cpersonalinfo.append("Twitter: "+twitter.value+"  ")});
linkedin.addEventListener('change', function(){cpersonalinfo.append("Instagram: "+linkedin.value+"  ")});


letterdate.addEventListener('change', function(){cdate.innerHTML = letterdate.value;});
recipient.addEventListener('keyup', function(){crecipient.innerHTML = recipient.value;});
company.addEventListener('keyup', function(){ccompany.innerHTML = company.value;});
companyaddress.addEventListener('keyup', function(){ccomaddress.innerHTML = companyaddress.value;});
ref.addEventListener('keyup', function(){cref.innerHTML = "<h4><u>REF: "+ref.value+"</u></h4><br />";});
coverbody.addEventListener('keyup', function(){cbody.innerHTML = coverbody.value;});

tinymce.init({
    selector: "#coverbody",
    setup : function(ed) {
        ed.on("keyup", function(){
            $(cbody).html(tinymce.activeEditor.getContent());
        });
   }
});