let choix = false;
let viande = false;
let electricite = false;

let facteurs = {
    "":0,
    "voiture" : 2.4,
    "avion" : 15.0,
    "bus" : 0.8,
    "velo" : 0.0,
    "marche" : 0.0,
    "viande" : 7.0,
    "electricite" : 0.3
};

document.addEventListener('DOMContentLoaded'),(event) => {
    let progressbar = document.getElementById('progressbar');
}
console.log(1)

function inputchange(){
    console.log('change')


    var choix_transport = document.getElementById('transport').value
    
    var valeur_viande = document.getElementById('viande').value

    var valeur_electricite = document.getElementById('electricite').value

    
    console.log(choix_transport)
    console.log(valeur_electricite)
    console.log(valeur_viande)
    
    progressbar.value = facteurs[choix_transport] + facteurs["viande"]*valeur_viande + facteurs["electricite"]*valeur_electricite;

}
