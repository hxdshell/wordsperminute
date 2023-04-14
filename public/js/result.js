let wordstyped = document.getElementById("wordstyped");
let totalerrors = document.getElementById("totalerrors");
let actualerrors = document.getElementById("actualerrors");
let incwordsdiv = document.getElementById("incwords");
let wrongwords = [];
let wrongwordsstr;

let getwpm = localStorage.getItem("wordstyped");
let getaccuracy = localStorage.getItem("accuracy");
let getrealaccuracy = localStorage.getItem("realaccuracy");

if(getwpm == null || getaccuracy == null || getaccuracy == null){
    window.location.href = '/';
}
else{
    wordstyped.innerHTML = getwpm + "wpm";
    totalerrors.innerHTML += getaccuracy + "%";
    actualerrors.innerHTML += getrealaccuracy + "%";
    
    wrongwordsstr = localStorage.getItem("incorrectwords");
    if (wrongwordsstr == "") {
        incwordsdiv.innerHTML +=
            "<h4 class='lighttext'>0 incorrect words, Nice work!<h4>";
    } else {
        wrongwords = wrongwordsstr.split(",");
        for (let i of wrongwords) {
            incwordsdiv.innerHTML += "<p>'" + i + "'</p>";
        }
    }
}
window.addEventListener("popstate", function (event) {
    window.location.replace("/");
});
window.history.pushState(null, null, window.location.href);
