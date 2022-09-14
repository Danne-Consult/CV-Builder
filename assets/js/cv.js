
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

const educont = document.getElementsByClassName("educont");
const educ = document.getElementsByClassName("educ");
const inst = document.getElementsByClassName("inst");
const edufrom = document.getElementsByClassName("edufrom");
const eduto = document.getElementsByClassName("eduto");
const eduach = document.getElementsByClassName("eduach");

const workcont = document.getElementsByClassName("workcont");
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

const socfb = document.getElementById("socfb");
const soctw = document.getElementById("soctw");
const socin = document.getElementById("socin");

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


  if(brief.value!==""){
  caboutme.innerHTML =  "<h4>About Me</h4>"+ brief.value;
  }
  if(lang.value!=""){
  clang.innerHTML = "<h4>Languages</h4>" + lang.value;
  }

  if(linkedin.value !==""){
    socin.innerHTML = '<a href="'+linkedin.value+'" target="_new"><i class="fa-brands fa-linkedin"></i></a>&nbsp;';
  }
  if(fb.value !=""){
    socfb.innerHTML = '<a href="'+fb.value+'" target="_new"><i class="fa-brands fa-facebook"></i></a>&nbsp;';
  }
  if(tw.value !=""){
    soctw.innerHTML = '<a href="'+tw.value+'" target="_new"><i class="fa-brands fa-twitter"></i></a>&nbsp;';
  }
  if(accredits.value!=""){
  caccredits.innerHTML = '<h4>Other Accreditations/Personal Achievements</h4>'+accredits.value;
  }

  if(interests.value!==""){
    cinterests.innerHTML = '<h4>Interests</h4>'+interests.value;
  }
  if(inst[0].value!==""){
    ceducation.innerHTML = "<h4>Education Background</h4>";
    for(var y = 0; y < educ.length; y++){
      ceducation.innerHTML += '<div class="edubx"><h5>'+ educ[y].value +'<br /><span>'+ inst[y].value +' : '+ edufrom[y].value +'-'+ eduto[y].value +'</span></h5><p>'+ eduach[y].value +'</p></div>';
    }
  }

  if(company[0].value!==""){
    cwork.innerHTML = "<h4>Work Experience</h4>";
    for(var z = 0; z < company.length; z++){
      cwork.innerHTML += '<div class="edubx"><h5>'+ company[z].value +'<br /><span>'+ pos[z].value +' : '+ comfrom[z].value +' to '+ comto[z].value +' </span></h5><p>'+ comach[z].value +'</p></div>';
    }
  }

  if(skillname[0].value !==""){
    cskillset.innerHTML = "<h4>Skills</h4>";
    for(var i = 0; i < skillname.length; i++){
      cskillset.innerHTML += '<div class="skillbx"><div class="skilldesc">'+ skillname[i].value +'</div><div class="progbar"><div class="range" style="width:'+ skillrange[i].value +'%;"></div></div></div> <br />';
    }
  }

  if(refname[0].value !==""){
    crefs.innerHTML ="<h4>References</h4>";
    for(var x = 0; x < refname.length; x++){
      crefs.innerHTML += '<div class="col-lg-4 refbx">'+ refname[x].value +'<br />'+ reforg[x].value +'<br />'+ refpos[x].value +'<br /><i class="fas fa-at"></i> '+ refemail[x].value +'<br /><i class="fas fa-phone"></i> '+ reftel[x].value +'</div>';
    }
  }

});


fname.addEventListener('keyup', function(){cfname.innerHTML = fname.value;});
jtitle.addEventListener('keyup', function(){ctitle.innerHTML = jtitle.value;});
gender.addEventListener('keyup', function(){cgender.innerHTML = gender.value;});
dob.addEventListener('change', function(){cdob.innerHTML = dob.value;});
nationality.addEventListener('keyup', function(){cnationality.innerHTML = nationality.value;});
email.addEventListener('keyup', function(){cemail.innerHTML = email.value;});
tel.addEventListener('keyup', function(){cmobile.innerHTML = tel.value;});
address.addEventListener('keyup', function(){cpostaladdress.innerHTML = address.value;});
postcode.addEventListener('keyup', function(){cpostaladdress.innerHTML += "-"+postcode.value;});
lang.addEventListener('keyup', function(){clang.innerHTML = "<h4>Languages</h4>"+ lang.value;});



tinymce.init({
  selector: "#brief",
  add_form_submit_trigger : true,
  setup : function(ed) {
      ed.on("keyup", function(){
        if(tinymce.activeEditor.getContent()!==""){
          $("#caboutme").html("<h4>About Me</h4>"+tinymce.activeEditor.getContent());
        }else{
          caboutme.innerHTML="";
        }
      });
}
});

var moreschool= document.getElementsByClassName("moreschool");


$("#edusub").click(function(){
  if(inst[0].value!==""){
    ceducation.innerHTML ="";
    ceducation.innerHTML ="<h4>Education background</h4>";
    
    var textid = "";
    for(var y = 0; y < educont.length; y++){
      textid = educont[y].children[3].querySelector(".eduach").id;
      ceducation.innerHTML +='<div class="edubx"><h5>'+ educ[y].value +'<br /><span>'+ inst[y].value +' : '+ edufrom[y].value +'-'+ eduto[y].value +'</span></h5><p>'+ tinymce.get(textid).getContent() +'</p></div>';
    }
  }
})

$("#worksub").click(function(){
  if(company[0].value!==""){
    cwork.innerHTML ="";
    cwork.innerHTML ="<h4>Work Experience</h4>";
    
    var textidw = "";
    for(var z = 0; z < workcont.length; z++){
      textidw = workcont[z].children[3].querySelector(".comach").id;
      cwork.innerHTML +='<div class="edubx"><h5>'+ company[z].value +'<br /><span>'+ pos[z].value +' : '+ comfrom[z].value +' to '+ comto[z].value +' </span></h5><p>'+ tinymce.get(textidw).getContent() +'</p></div>';   
    }
  }
})


 tinymce.init({
    selector: "#accredits",
    add_form_submit_trigger : true,
    setup : function(ed) {
        ed.on("keyup", function(){
          if(tinymce.activeEditor.getContent()!==""){
            $("#caccredits").html("<h4>Other Accreditations/Personal Achievements</h4>"+tinymce.activeEditor.getContent());
          }else{
            caccredits.innerHTML="";
          }
        });
  }
  });

$("#skillsub").click(function(){
if(skillname[0].value !=""){
  cskillset.innerHTML="";
  cskillset.innerHTML="<h4>Skills</h4>";
    for(var q = 0; q < skillrange.length; q++){

        cskillset.innerHTML +='<div class="skillbx"><div class="skilldesc">'+ skillname[q].value +'</div><div class="progbar"><div class="range" style="width:'+ skillrange[q].value +'%;"></div></div></div><br />';

    }
  }else{
    cskillset.innerHTML="";
  }
});

  linkedin.addEventListener('keyup', function(){
    if(linkedin.value!==""){
    socin.innerHTML = '<a href="'+linkedin.value+'" target="_new"><i class="fa-brands fa-linkedin"></i></a>&nbsp;';
    }else{
      socin.innerHTML ="";
    }
  });


  fb.addEventListener('keyup', function(){
    if(fb.value!==""){
    socfb.innerHTML = '<a href="'+fb.value+'" target="_new"><i class="fa-brands fa-facebook"></i></a>&nbsp;';
    }else{
      socfb.innerHTML ="";
    }
  });

  tw.addEventListener('keyup', function(){
    if(tw.value!==""){
    soctw.innerHTML = '<a href="'+tw.value+'" target="_new"><i class="fa-brands fa-twitter"></i></a>&nbsp;';
    }else{
      soctw.innerHTML ="";
    }
  });


tinymce.init({
  selector: "#interests",
  add_form_submit_trigger : true,
  setup : function(ed) {
      ed.on("keyup", function(){
        if(tinymce.activeEditor.getContent()!==""){
          $("#cinterests").html("<h4>Interests</h4>"+tinymce.activeEditor.getContent());
        }else{cinterests.innerHTML=""}
      });
}
});

$(".submit").click(function(){
  if(refname[0].value !=""){
    crefs.innerHTML="";
    crefs.innerHTML="<h4>References</h4>";

      for(var f = 0; f < refname.length; f++){
  
        crefs.innerHTML += '<div class="col-lg-4 refbx">'+ refname[f].value +'<br />'+ reforg[f].value +'<br />'+ refpos[f].value +'<br /><i class="fas fa-at"></i> '+ refemail[f].value +'<br /><i class="fas fa-phone"></i> '+ reftel[f].value +'</div>';
          
      }
    }
  });
  


var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var resumebx = document.getElementById("resumebx");

btn.onclick = function() {
    modal.innerHTML = resumebx.innerHTML;
    modal.style.display = "block";
}
resumebx.onclick = function(){
  modal.innerHTML = resumebx.innerHTML;
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

  