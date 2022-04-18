const url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/';

function populateStates(){
	fetch(url)
	.then(res => res.json())
	.then((statesList) => {
		console.log('Checkout this JSON! ', statesList);
	  
		var options = '';

		for (var i = 0; i < statesList.length; i++) {
			options += '<option value="' + statesList[i].sigla + '">' + statesList[i].nome + '</option>';
		}

	document.getElementById('states').innerHTML = options;
	})
	.catch(err => { throw err });
}

function populateCities(state){
	fetch(url+'/'+state+'/municipios')
	.then(res => res.json())
	.then((citiesList) => {
		console.log('Checkout this JSON! ', citiesList);
	  
		var options = '';

		for (var i = 0; i < citiesList.length; i++) {
		  options += '<option value="' + citiesList[i].nome + '">' + citiesList[i].nome + '</option>';
		}

	document.getElementById('cities').innerHTML = options;
	})
	.catch(err => { throw err });
}

populateStates();
//populateCities();