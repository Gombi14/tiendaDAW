document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".update-cart").forEach((input) => {
        input.addEventListener("change", function () {
            let productId = this.getAttribute("data-id") // Obtiene el ID del producto
            let quantity = this.value // Obtiene la nueva cantidad

            fetch("/update-cart", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({
                    id: productId,
                    cantidad: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    alert("Hubo un error al actualizar el carrito")
                }
            })
            .catch(error => console.error("Error:", error))
        })
    })
})