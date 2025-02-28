document.addEventListener('DOMContentLoaded', function() {
    getProductos()

    document.getElementById('search').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault() 
            let filter = document.getElementById('search').value // Obtiene el valor del campo de búsqueda
            console.log(filter)
            getProductos(filter)
        }
    })
})

function getProductos(filter = '') {
    let htmlCode = '';
    fetch('/getProductos', { // La URL debe coincidir con la definida en routes/web.php
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ filter: filter })
    })
    .then(response => response.json())
    .then(data => {
        console.log('data');
        console.log(data);
        data.forEach(element => {
            htmlCode += `
                <div class="flex flex-col w-96 bg-gray-900 text-white p-4 rounded-lg">
                    <h2>${element.name}</h2>
                    <h2 class="text-right">${element.price}</h2>
                </div>
            `;
        });
        document.getElementById('productos').innerHTML = htmlCode;
    })
    .catch(error => console.error(error));
}