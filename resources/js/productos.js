document.addEventListener('DOMContentLoaded', function() {
    getProductos()

    document.getElementById('search').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault() 
            let filter = document.getElementById('search').value // Obtiene el valor del campo de búsqueda
            let categoria = document.getElementById('categorias-select').value // Obtiene el valor del campo de categoría
            getProductos(filter, categoria)
        }
    })
    document.getElementById('categorias-select').addEventListener('change', (e) => {
        let filter = document.getElementById('search').value // Obtiene el valor del campo de búsqueda
        let categoria = document.getElementById('categorias-select').value // Obtiene el valor del campo de categoría
        getProductos(filter, categoria)
    })
    document.getElementById('apply-filters').addEventListener('click', (e) => {
        let filter = document.getElementById('search').value // Obtiene el valor del campo de búsqueda
        let categoria = document.getElementById('categorias-select').value // Obtiene el valor del campo de categoría
        getProductos(filter, categoria)
    })
})

function getProductos(filter = '', categoria = '') {
    let htmlCode = ''
    fetch('/getProductos', { // La URL debe coincidir con la definida en routes/web.php
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ 
            filter: filter,
            categoria: categoria
        })
    })
    .then(response => response.json())
    .then(response => {
        response.forEach(element => {
            htmlCode += `
                <a class="card" href="/producto/${element.id}">
                    <div class="">
                        <img class="w-[320px] rounded-lg" src="${element.image}" alt="${element.name}" class="rounded-lg mb-3">
                        <h2 class="text-2xl">${element.name}</h2>
                        <h2 class="text-lg">${element.categoria.name}</h2>
                        <h2 class="text-right">${element.price}€</h2>
                    </div>
                </a>
            `
        })
        document.getElementById('productos').innerHTML = htmlCode
    })
    .catch(error => console.error(error))
}