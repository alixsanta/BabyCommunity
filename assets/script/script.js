//récupération de l'élément HTML (select id="id_categorie")
const categories = document.querySelector('#id_categorie');
//récupération du json (depuis l'url)
const url = "./cat";
//génére la liste déroulante
async function getCategorie(){
    //récupéation du json
    const list = await fetch(url);
    //convertion en tableau
    const choice = await list.json();
    //version avec forEach
    choice.forEach(obj=>{
        const option = document.createElement("option");
        //affectation du paramètre value à option 
        option.setAttribute("value",obj.id_categorie);
        //ajout du textContent de l'option
        option.textContent = obj.categorie;
        //création d'un enfant option=> select
        categorie.appendChild(option);
    });
    //version boucle for
    /* for (let i in choice){
        console.log(choice[i].nom_categorie);
        const option = document.createElement("option");
        //affectation du paramètre value à option 
        option.setAttribute("value",choice[i].id_cat);
        //ajout du textContent de l'option
        option.textContent = choice[i].nom_cat;
        //création d'un enfant option=> select
        categories.appendChild(option);
    } */
}
//appel de la fonction
getCategorie();