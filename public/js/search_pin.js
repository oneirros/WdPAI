const search = document.querySelector('input[placeholder="search pin"]');
const pinContainer = document.querySelector(".places");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search_pin", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (pins) {
            pinContainer.innerHTML = "";
            loadProjects(pins)
        });
    }
});