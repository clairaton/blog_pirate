app = {
	/*
	 * Fonction appelée au chargement du DOM
	 */
	init: function() {
		console.info("app.init")

		// on pose un écouteur sur les posts de la page d'acceuil
		$('.post').hover(app.slideDown,app.slideUp)

		
	},

	slideDown : function() {
		console.info("app.slideDown")

		// On cible le slide que l'on veur faire apparaître
		app.target = $(this).children().children().next()
	
		// On slide le détail du post
		app.target.slideDown(800)
	},

	slideUp : function() {
		console.log("app.slideUp")

		// On referme le slide
		app.target.fadeOut(400)
	}

}


/*
 * Chargement du DOM
 */
$(function(){
	app.init()
})