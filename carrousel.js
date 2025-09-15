// Caroussel d'images

// Array des chemins des images
var slide = ["images/carrousel1.jpg", "images/carrousel2.jpg", "images/carrousel3.jpg", "images/carrousel4.jpg"];

//Position sur le slider
var num = 0;

//Image principale
const	caroussel = document.getElementById("slider");

//Conteneur des icones & nodeList des icones (+ filtres sombres)
const	carousselSelector = document.getElementById("carrousel-selector__container");
const	carousselImages = document.getElementsByClassName("img-selector");
const	carousselImagesFilter = document.getElementsByClassName("darkFilterImg");

//Boutons précédent et suivant
const	precCar3 = document.getElementById("precedent");
const	suivCar3 = document.getElementById("suivant");
/*
window.onload = function() {
	carousselImagesFilter[0].style.opacity = "0";
};*/

function	ep_moveSlide(i) {
	//On calcule la marge pour que l'icone soit centrée
	// 100: Marge d'origine ; 57: Taille icone + marge
	let margin = (40 - (i * 5)) + "%";

	// On cache une flèche si on est sur la 1ere ou dernier image
	if(i == 0)
		precCar3.style.display = "none";
	else
		precCar3.style.display = "block";
	if (i == slide.length - 1)
		suivCar3.style.display = "none";
	else
		suivCar3.style.display = "block";

	num = i;

	//Agrandissement de l'image focus (+ défocus) & gestion du filtre
	for (let a = 0; a < carousselImages.length; a++) {
		if (carousselImages[a].classList.contains("img-focus"))
			carousselImages[a].classList.remove("img-focus");

		if (getComputedStyle(carousselImagesFilter[a]).opacity == "0")
			carousselImagesFilter[a].style.opacity = "1";
	}
	carousselImages[i].classList.add("img-focus");
	carousselImagesFilter[i].style.opacity = "0";

	//Centrage de l'icone & affichage de la bonne img
	carousselSelector.style.marginLeft = margin;
	caroussel.style.backgroundImage = "url(" + slide[i] + ")";
}

function ep_changeSlide(sens) {
	num += sens;
	if (num < 0)
		num = 0;
	else if (num >= slide.length)
		num = slide.length - 1;

	ep_moveSlide(num)	
}

/* Modal */

const modal = document.getElementById("myModal");

//On prend l'image et on la met dans la modale
//On utilisera l'img "dynamique" de id=caroussel

const modalImg = document.getElementById("img01");


caroussel.onclick = function() {
	let modalImgUrl = window.getComputedStyle(caroussel, null).getPropertyValue("background-image");
	let modalImgUrlClean = modalImgUrl.substring(modalImgUrl.indexOf("images"), modalImgUrl.length - 2);


	modal.style.display = "block";
	modalImg.src = modalImgUrlClean;
}

// Gérer la fermeture de la modal

function	ep_closeModal() {
	modal.style.display = "none";
}