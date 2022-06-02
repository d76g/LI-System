document.getElementById("filter_role").addEventListener("change", function () {
    let sector = this.value || this.options[this.selectedIndex].value;
    window.location.href =
        window.location.href.split("?")[0] + "?role=" + sector;
});

document.getElementById("btn-clear-search").addEventListener("click", () => {
let input = document.getElementById("search"),
    select = document.getElementById("filter_role");
   

input.value = "";
select.selectedIndex = 0;
window.location.href = window.location.href.split("?")[0];
});

const toggleClearSearchButton = () => {
let query = location.search,
    pattern = /[?&]search=/,
    button = document.getElementById("btn-clear-search");

if (pattern.test(query)) {
    button.style.display = "block";
} else {
    button.style.display = "none";
}
};

toggleClearSearchButton();

const toggleClearButtonforDropDown = () => {
let query = location.search,
    pattern = /[?&]role=/,
    button = document.getElementById("btn-clear-search");

if (pattern.test(query)) {
    button.style.display = "block";
} else {
    button.style.display = "none";
}
};

toggleClearButtonforDropDown();