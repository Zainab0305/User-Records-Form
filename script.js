
function loadTable() {
    fetch("in.php?list=1")
        .then(response => response.json())
        .then(users => {
            const tbody = document.querySelector("#usersTable tbody");
            tbody.innerHTML = "";

            users.forEach(user => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${user.ID}</td>
                    <td>${user.Name}</td>
                    <td>${user.Age}</td>
                    <td id="status-${user.ID}">${user.Status}</td>
                    <td><button type="button" onclick="toggleStatus(${user.ID})">Toggle</button></td>
                `;
                tbody.appendChild(tr);
            });
        });
}


function toggleStatus(id) {
    fetch("in.php?toggle=" + id)
        .then(response => response.text())
        .then(newStatus => {
            document.getElementById("status-" + id).textContent = newStatus;
        });
}


document.addEventListener("DOMContentLoaded", () => {
    loadTable(); 

    const form = document.getElementById("userForm");
    form.addEventListener("submit", (e) => {
        e.preventDefault(); 

        const name = document.getElementById("name").value;
        const age = document.getElementById("age").value;

        fetch(`in.php?Name=${encodeURIComponent(name)}&Age=${encodeURIComponent(age)}`)
            .then(response => response.text())
            .then(() => {
                form.reset();
                loadTable(); 
            });
    });
});