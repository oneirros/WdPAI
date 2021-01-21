const search = document.querySelector('input[placeholder="search trip"]');
const tripContainer = document.querySelector(".trips");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search_trip", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (trips) {
            tripContainer.innerHTML = "";
            loadProjects(trips)
        });
    }
});

function loadProjects(trips) {
    trips.forEach(trip => {
        console.log(trip);
        createProject(trip);
    });
}

function createProject(trip) {
    const template = document.querySelector("#trip-template");

    const clone = template.content.cloneNode(true);
    const id = clone.querySelector(".button");
    id.href = '/trip_plan/'+trip.id_trip;
    const title = clone.querySelector(".button");
    title.innerHTML = trip.title;


    tripContainer.appendChild(clone);
}