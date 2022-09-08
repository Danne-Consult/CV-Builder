
const fname = document.getElementById("fname");
const jtitle = document.getElementById("jtitle");
const gender = document.getElementById("gender");
const dob = document.getElementById("dob");
const nationality = document.getElementById("nationality");
const lang = document.getElementById("lang");
const email = document.getElementById("email");
const tel = document.getElementById("tel");
const address = document.getElementById("address");
const postcode = document.getElementById("postcode");
const brief = document.getElementById("brief");


const educ = document.getElementsByClassName("educ");
const inst = document.getElementsByClassName("inst");
const edufrom = document.getElementsByClassName("edufrom");
const eduto = document.getElementsByClassName("eduto");
const eduach = document.getElementsByClassName("eduach");

const company = document.getElementsByClassName("company");
const pos = document.getElementsByClassName("pos");
const comfrom = document.getElementsByClassName("comfrom");
const comto = document.getElementsByClassName("comto");
const comach = document.getElementsByClassName("comach");

const accredits = document.getElementById("accredits");
const skillname = document.getElementsByClassName("skillname");
const skillrange = document.getElementsByClassName("skillrange");


const linkedin = document.getElementById("linkedin");
const fb = document.getElementById("fb");
const tw = document.getElementById("tw");

const interests = document.getElementById("interests");

const refname = document.getElementsByClassName("refname");
const reforg = document.getElementsByClassName("reforg");
const refpos = document.getElementsByClassName("refpos");
const refemail = document.getElementsByClassName("refemail");
const reftel = document.getElementsByClassName("reftel");




const cfname = document.getElementById("cfname");
const ctitle = document.getElementById("ctitle");
const cgender = document.getElementById("cgender");
const cdob = document.getElementById("cdob");
const cnationality = document.getElementById("cnationality");
const clang = document.getElementById("clang");
const cemail = document.getElementById("cemail");
const cmobile = document.getElementById("cmobile");
const cpostaladdress = document.getElementById("cpostaladdress");
const caboutme = document.getElementById("caboutme");


const cskillset = document.getElementById("cskillset");
const cinterests = document.getElementById("cinterests");
const ceducation = document.getElementById("ceducation");
const cwork = document.getElementById("cwork");
const caccredits = document.getElementById("caccredits");
const csocials = document.getElementById("csocials");

const crefs = document.getElementById("crefs");

window.addEventListener('load', function(){
  cfname.innerHTML = fname.value;
  ctitle.innerHTML = jtitle.value;
  cgender.innerHTML = gender.value;
  cdob.innerHTML = dob.value;
  cnationality.innerHTML = nationality.value;
  cemail.innerHTML = email.value;
  cmobile.innerHTML = tel.value;
  cpostaladdress.innerHTML = address.value+"-"+postcode.value;
  caboutme.innerHTML =  "<h4>About Me</h4>"+ brief.value;

  if(linkedin!==""){
    csocials.innerHTML += '<a href="'+linkedin.value+'" target="_new"><i class="fa-brands fa-linkedin"></i></a>&nbsp;';
  }
  if(fb!==""){
    csocials.innerHTML += '<a href="'+fb.value+'" target="_new"><i class="fa-brands fa-facebook"></i></a>&nbsp;';
  }
  if(tw!==""){
    csocials.innerHTML += '<a href="'+tw.value+'" target="_new"><i class="fa-brands fa-twitter"></i></a>&nbsp;';
  }

  caccredits.innerHTML = '<h4>Other Accreditations/Personal Achievements</h4>'+accredits.value;
  cinterests.innerHTML = '<h4>Interests</h4>'+interests.value;

  if(educ!==""){
    ceducation.innerHTML = "<h4>Education Background</h4>";
    for(var y = 0; y < educ.length; y++){
      ceducation.innerHTML += '<div class="edubx"><h5>'+ educ[y].value +'<br /><span>'+ inst[y].value +' : '+ edufrom[y].value +'-'+ eduto[y].value +'</span></h5><p>'+ eduach[y].value +'</p></div>';
    }
  }

  if(company!==""){
    cwork.innerHTML = "<h4>Work Experience</h4>";
    for(var z = 0; z < company.length; z++){
      cwork.innerHTML += '<div class="edubx"><h5>'+ company[z].value +'<br /><span>'+ pos[z].value +' : '+ comfrom[z].value +' to '+ comto[z].value +' </span></h5><p>'+ comach[z].value +'</p></div>';
    }
  }

  if(skillname!==""){
    for(var i = 0; i < skillname.length; i++){
      cskillset.innerHTML += '<div class="skillbx"><div class="skilldesc">'+ skillname[i].value +'</div><div class="progbar"><div class="range" style="width:'+ skillrange[i].value +'%;"></div></div></div>';
    }
  }

  if(refname!==""){
    crefs.innerHTML ="<h4>References</h4>";
    for(var x = 0; x < refname.length; x++){
      crefs.innerHTML += '<div class="col-lg-4 refbx">'+ refname[x].value +'<br />'+ reforg[x].value +'<br />'+ refpos[x].value +'<br /><i class="fas fa-at"></i> '+ refemail[x].value +'<br /><i class="fas fa-phone"></i> '+ reftel[x].value +'</div>';
    }
  }

});


fname.addEventListener('keyup', function(){cfname.innerHTML = fname.value;});






/*coverbody.addEventListener('keyup', function(){cbody.innerHTML = coverbody.value;});

    tinymce.init({
        selector: "#coverbody",
        add_form_submit_trigger : true,
        setup : function(ed) {
            ed.on("keyup", function(){
                $(cbody).html(tinymce.activeEditor.getContent());
            });
    }
});*/


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

  