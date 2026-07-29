

function toggleStatus(id) {
    fetch("in.php?toggle=" + id)
        .then(response => response.text())
        .then(newStatus => {
            document.getElementById("status-" + id).textContent = newStatus;
        });
}