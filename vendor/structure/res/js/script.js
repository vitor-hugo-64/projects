( function () {

	'use strict';

	var $load = document.querySelector("[data-js='load']");
	var $search = document.querySelector("[data-js='search']");

	var img = '<img src="/vendor/structure/res/img/loading.gif" style="width: 38px;" data-js="loading">';

	$search.addEventListener( 'keyup', function () {

		$load.innerHTML = img;
		var ajax = new XMLHttpRequest();

		if ( !$search.value) {
			ajax.open( 'GET', '/ajax/search');
		} else {
			ajax.open( 'GET', '/ajax/search/' + $search.value);
		}
		
		ajax.send( null);

		ajax.addEventListener( 'readystatechange', function () {

			if ( this.readyState === 4) {
				$load.removeChild( document.querySelector("[data-js='loading']"));

				if ( this.status == 200) {
					var $table = document.querySelector("[data-js='table']");
					$table.innerHTML = ajax.responseText;
				}

			}

		});

	}, false);

})();