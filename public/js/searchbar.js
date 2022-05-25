document.getElementById("btn-refresh").addEventListener("click", () => {
    let input = document.getElementById("search")
    input.value = "";
    window.location.href = window.location.href.split("?")[0];
});

const toggleRefreshButton = () => {
    let query = location.search,
        pattern = /[?&]search=/,
        button = document.getElementById("btn-refresh");

    if (pattern.test(query)) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
};
toggleRefreshButton();

// SV Search Bar
    document.getElementById("filter_sv").addEventListener("change", function () {
    let sv = this.value || this.options[this.selectedIndex].value;
    window.location.href =
        window.location.href.split("?")[0] + "?sv=" + sv;
    });

    document.getElementById("sv-btn-refresh").addEventListener("click", () => {
    let select = document.getElementById("filter_sv")
    select.selectedIndex = 0;
    window.location.href = window.location.href.split("?")[0];
    });

    const toggleClearButtonforsvDropDown = () => {
    let query = location.search,
        pattern = /[?&]sv=/,
        button = document.getElementById("sv-btn-refresh");

    if (pattern.test(query)) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
    };
    toggleClearButtonforsvDropDown();

