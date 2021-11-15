var search = document.getElementById('search');
var matchList = document.getElementById('match-list');

const searchStates = async searchText => {
        var res = await fetch('?action=json&controller=produit');
        var states = await res.json();

        let matches = states.filter(state =>{
           var regex = new RegExp(`^${searchText}`, 'gi');
           return state.name.match(regex) || state.categorie.match(regex);
        });
    if(searchText.length === 0){
        matches = [];
        matchList.innerHTML = '';
    }

    outputHtml(matches);
}

const outputHtml = matches => {
    if (matches.length > 0){
        const html = matches.map(match => `
                <div class= "card card-body mb-1">
                <a href="?action=read&idProduit=${match.id}&controller=Produit">${match.name}</a>
                ${match.prix}€
                </div>
                `).join('');
        console.log(html);
        matchList.innerHTML = html;
        }
}
search.addEventListener('input',() => searchStates(search.value));