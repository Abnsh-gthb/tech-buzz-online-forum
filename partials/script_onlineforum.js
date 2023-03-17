// JavaScript code
function search_category() {
    
	let input = document.getElementById('searchbar').value
	input=input.toLowerCase();
	let x = document.body.getElementsByClassName('category-card');
	
	for (i = 0; i < x.length; i++) {
		if (!x[i].innerHTML.toLowerCase().includes(input)) {
			x[i].style.display="none";
		}
		else {
			x[i].style.display="block";				
		}
	}
}

//And we can also do the search algorithm with help of sql query in a new page with just use of FULLTEXT.......

function collaps(){
    event.preventDefault();
    let searchbar=document.getElementById('searchbar')

    searchbar.classList.toggle('searchbar')
}
