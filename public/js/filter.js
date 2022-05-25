document.getElementById("filter_sector").addEventListener("change", function () {
        let sector = this.value || this.options[this.selectedIndex].value;
        window.location.href =
            window.location.href.split("?")[0] + "?sector=" + sector;
    });
document.getElementById("filter_ecosector").addEventListener("change", function () {
        let ecoSector = this.value || this.options[this.selectedIndex].value;
        window.location.href =
            window.location.href.split("?")[0] + "?ecoSector=" + ecoSector;
    });



// document.getElementById("btn-clear").addEventListener("click", () => {
//     let input = document.getElementById("search"),
//         select = document.getElementById("filter_sector");

//     input.value = "";
//     select.selectedIndex = 0;
//     window.location.href = window.location.href.split("?")[0];
// });

document.getElementById("btn-clear").addEventListener("click", () => {
    let input = document.getElementById("search"),
        select = document.getElementById("filter_sector"),
        select2 = document.getElementById("filter_ecosector");

    input.value = "";
    select.selectedIndex = 0;
    select2.selectedIndex = 0;
    window.location.href = window.location.href.split("?")[0];
});

const toggleClearButton = () => {
    let query = location.search,
        pattern = /[?&]search=/,
        button = document.getElementById("btn-clear");

    if (pattern.test(query)) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
};

toggleClearButton();

const toggleClearButtonforDropDown = () => {
    let query = location.search,
        pattern = /[?&]sector=/,
        button = document.getElementById("btn-clear");

    if (pattern.test(query)) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
};

toggleClearButtonforDropDown();
