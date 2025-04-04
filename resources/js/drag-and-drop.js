document.addEventListener("DOMContentLoaded", () => {
    if (typeof user != "undefined" && user.drag_and_drop == 0) {
        
        document.getElementById("gamePopup").style.display = "block";


        function closePopup() {
            document.getElementById("gamePopup").style.display = "none";
        
    }
    
    const closeButton = document.getElementById("closeButton");
    closeButton.addEventListener("click", () => {
        closePopup();
    });


    const draggables = document.querySelectorAll(".draggable");
    const droppables = document.querySelectorAll(".droppable");
    let correctPlacements = 0;

    draggables.forEach(draggable => {
        draggable.addEventListener("dragstart", event => {
            event.dataTransfer.setData("text", event.target.id);
        });
    });

    droppables.forEach(droppable => {
        droppable.addEventListener("dragover", event => {
            event.preventDefault();
            const draggedId = event.dataTransfer.getData("text");

            if (draggedId === droppable.getAttribute("data-target")) {
                droppable.classList.add("highlight");
            }
        });

        droppable.addEventListener("dragleave", () => {
            droppable.classList.remove("highlight");
        });

        droppable.addEventListener("drop", event => {
            event.preventDefault();
            const draggedId = event.dataTransfer.getData("text");
            const draggedElement = document.getElementById(draggedId);

            if (draggedId === droppable.getAttribute("data-target") && !droppable.hasChildNodes()) {
                droppable.appendChild(draggedElement);
                correctPlacements++;

                droppable.classList.remove("highlight");

                if (correctPlacements === draggables.length) {
                    document.getElementById("winMessage").style.display = "block";
                    document.getElementById("closeButton").style.display = "block";
                }
            } else {
                droppable.classList.remove("highlight");
            }
        });
    });
    }
});

