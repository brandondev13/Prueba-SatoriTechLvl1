document.addEventListener("DOMContentLoaded", function () {
    const charactersEl = document.getElementById("characters");
    const nameFilterEl = document.getElementById("name-filter");
    const fetchButton = document.getElementById("fetchButton");
    const modal = document.getElementById("myModal");
    const modalContent = document.getElementById("modalContent");
    fetchButton.addEventListener("click", async () => {
        const locationId = nameFilterEl.value;
        const characters = await getCharactersByLocation(locationId);
        displayCharacters(characters);

        document.body.style.backgroundColor = getColorBasedOnId(locationId);
    });

    async function getCharactersByLocation(locationId) {
        const locationUrl = `https://rickandmortyapi.com/api/location/${locationId}`;
        const locationResponse = await fetch(locationUrl);
        const locationData = await locationResponse.json();
        const residents = locationData.residents.slice(0, 5);

        const characters = [];
        for (const resident of residents) {
            const characterResponse = await fetch(resident);
            const characterData = await characterResponse.json();
            characters.push(characterData);
        }

        characters.sort((a, b) => a.name.localeCompare(b.name));

        return characters;
    }

    function getColorBasedOnId(locationId) {
        if (locationId < 51) {
            return "green";
        } else if (locationId > 50 && locationId < 80) {
            return "blue";
        } else {
            return "red";
        }
    }

    function displayCharacters(characters) {
        charactersEl.innerHTML = "";

        for (let character of characters) {
            const card = document.createElement("div");
            card.classList.add("character-card");

            const episodesLinks = character.episode
                .slice(0, 3)
                .map((episode) => `<a href="${episode}">${episode}</a>`)
                .join(", ");

            card.innerHTML = `
                <img src="${character.image}" />
                <h2>${character.name}</h2>
                <p>Status: ${character.status}</p>
                <p>Species: ${character.species}</p>
                <p>Origin: ${character.origin.name}</p>
                <p>Episodes: ${episodesLinks}</p>
            `;

            charactersEl.appendChild(card);

            card.addEventListener("click", () => {
                showModal(character);
            });
        }
    }

    function showModal(character) {
        const episodesLinks = character.episode
            .slice(0, 3)
            .map((episode) => `<a href="${episode}">${episode}</a>`)
            .join(", ");

        modalContent.innerHTML = `
            <p><img src="${character.image}" /></p>
            <h2>${character.name}</h2>
            <p>Status: ${character.status}</p>
            <p>Species: ${character.species}</p>
            <p>Origin: ${character.origin.name}</p>
            <p>Episodes: ${episodesLinks}</p>
        `;
        modal.style.display = "block";
    }

    const span = document.getElementsByClassName("close")[0];

    span.onclick = function () {
        modal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

    charactersEl.addEventListener("click", (event) => {
        const characterCard = event.target.closest(".character-card");
        if (characterCard) {
            const characterIndex = Array.from(
                characterCard.parentNode.children
            ).indexOf(characterCard);
            const character = characters[characterIndex];
            showModal(character);
        }
    });
});
