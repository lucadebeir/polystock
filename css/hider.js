function afficherEvenementsPast(){
  if(document.getElementById("eventpast").style.display == "none")
  {
    document.getElementById("eventpast").style.display = "block";
  }
  else document.getElementById("eventpast").style.display = "none";
  document.getElementById("eventfutur").style.display = "none";
  document.getElementById("other").style.display = "none";
}

function afficherEvenementsFuturs(){
  if(document.getElementById("eventfutur").style.display == "none")
  {
    document.getElementById("eventfutur").style.display = "block";
  }
  else document.getElementById("eventfutur").style.display = "none";
  document.getElementById("eventpast").style.display = "none";
  document.getElementById("other").style.display = "none";
}

function afficherToutEvenement(){
  if(document.getElementById("other").style.display == "none")
  {
    document.getElementById("other").style.display = "block";
  }
  else document.getElementById("other").style.display = "none";
  document.getElementById("eventpast").style.display = "none";
  document.getElementById("eventfutur").style.display = "none";
}

