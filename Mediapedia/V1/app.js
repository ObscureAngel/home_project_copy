/**
 * Fonction exemple pour angular
 */
(function() {
	var app = angular.module('store', []);
	
	app.controller('StoreController', function(){
		this.products = biblios;
	});
	
	var biblios = [
		{
			nom: 'Far Cry 3',
			prix: 29.99,
			description: 'Panique sur Rook Island !\nEntre Vaas et Hoyter, Jason Brody va\ndevoir se battre pour venger son frère.',
			voirFiche: true,
			jaipas: false,
		},
		{
			nom: 'Far Cry 4',
			prix: 49.99,
			description: 'Dans les montagnes',
			voirFiche: false,
			jaipas: false,
		}
	]
	
})();


/**
 * Fonction pour la recherche de films
 */
(function() {
	var recherche = angular.module('recherche', []);
	
	recherche.controller('TypeRechercheControlleur', function() {
		this.formulaires = onglets;
	})
	
	var onglets = [
		{
			nom: 'Genre',
			selectionne: true,
		},
		{
			nom: 'Titre',
			selectionne: false,
		},
		{
			nom: 'Audio',
			selectionne: true,
		},
		{
			nom: 'Qualite',
			selectionne: true,
		},
		{
			nom: 'SousTitres',
			selectionne: true,
		}
	]
})();