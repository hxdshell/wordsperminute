let timertxt = document.getElementById("timer");
let inputfield = document.getElementById("typingfield");
let paragrapharea = document.querySelector(".paragraph");
let time = 60;
let i = (j = 0);
let modkeys = [
    "Shift",
    "Alt",
    "Tab",
    "Control",
    "CapsLock",
    "Enter",
    "OS",
    "Escape",
    "Unidentified",
    "ArrowUp",
    "ArrowDown",
    "ArrowLeft",
    "ArrowRight",
    "Home",
    "End",
    "PageUp",
    "PageDown",
    "Delete",
    "AudioVolumeMute",
    "AudioVolumeDown",
    "AudioVolumeUp",
    "MediaTrackPrevious",
    "MediaPlayPause",
    "MediaTrackNext",
    "AltGraph",
];
let modkeysstart = [
    " ",
    "Backspace",
    "Shift",
    "Alt",
    "Tab",
    "CapsLock",
    "Control",
    "Enter",
    "OS",
    "Escape",
    "Unidentified",
    "ArrowUp",
    "ArrowDown",
    "ArrowLeft",
    "ArrowRight",
    "Home",
    "End",
    "PageUp",
    "PageDown",
    "Delete",
    "AudioVolumeMute",
    "AudioVolumeDown",
    "AudioVolumeUp",
    "MediaTrackPrevious",
    "MediaPlayPause",
    "MediaTrackNext",
    "AltGraph",
];
let error = 0,
    errorpos = [],
    letterstyped = 0;
let iscorrect = false,
    teststarted = false,
    isctrlpressed = false,
    scrollptr = 0;
let rect,
    wordstyped = 0,
    totalletterstyped = 0;
let totalerrors = 0,
    actualerrors = 0;
let incorrectwords = [];

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

paragrapharea.scroll(0, 0);
inputfield.addEventListener("keydown", function start(e) {
    if (!modkeysstart.includes(e.key)) {
        countdownTimer();
        teststarted = true;
        inputfield.removeEventListener("keydown", start);
        window.addEventListener("popstate", function (event) {
            window.location.reload();
        });
        window.history.pushState(null, null, window.location.href);
    }
});
// dictionary is from internal script inside welcome.blade.php
inputfield.onkeydown = onkeyup = function (e) {
    if (e.key == "Control" && e.type == "keydown") {
        isctrlpressed = true;
    } else if (e.key == "Control" && e.type == "keyup") {
        isctrlpressed = false;
    }
    if (!modkeys.includes(e.key) && teststarted && e.type == "keyup") {
        if (e.key == " ") {
            if (letterstyped < dictionary[i].length) {
                error += dictionary[i].length - letterstyped;
            }
            totalletterstyped += dictionary[i].length;
            if (
                letterstyped >= dictionary[i].length ||
                letterstyped == dictionary[i].length - 1
            ) {
                wordstyped++;
            }
            i++;
            j = 0;
            inputfield.value = "";
            document.getElementById(i - 1).style.background = "none";
            if (error == 0) {
                document.getElementById(i - 1).style.color = "green";
            } else {
                document.getElementById(i - 1).style.color = "red";
                incorrectwords.push(dictionary[i - 1]);
            }
            rect = document.getElementById(i).getBoundingClientRect();
            if (Math.round(rect.y) >= 250) {
                paragrapharea.scroll({
                    top: (scrollptr += 130),
                    left: 0,
                    behavior: "smooth",
                });
            }
            letterstyped = 0;
            error = 0;
            errorpos = [];
            //console.log(Math.round(rect.y))
        } else if (e.key == "Backspace") {
            if (isctrlpressed) {
                j = 0;
                letterstyped = 0;
                error = 0;
                document.getElementById(i).style.color = "white";
            }
            if (j != 0) {
                j--;
                letterstyped--;
                if (errorpos.includes(j)) {
                    error--;
                    totalerrors--;
                    errorpos.pop();
                }
                if (error < 0) {
                    error = 0;
                }
                if (error == 0) {
                    document.getElementById(i).style.color = "white";
                }
            }
        } else {
            letterstyped++;
            if (e.key.localeCompare(dictionary[i][j]) == 0) {
                iscorrect = true;
            } else {
                iscorrect = false;
                error++;
                errorpos.push(j);
                document.getElementById(i).style.color = "red";
                actualerrors++;
                totalerrors++;
            }
            j++;
        }
        document.getElementById(i).style.background = "black";
    }
};

function endtest() {
    //calculate accuracy
    let accuracy =
        ((totalletterstyped - totalerrors) / totalletterstyped) * 100;
    let realaccuracy =
        ((totalletterstyped - actualerrors) / totalletterstyped) * 100;

    if (accuracy < 0) {
        accuracy = 0.0;
    }
    if (realaccuracy < 0) {
        realaccuracy = 0.0;
    }
    localStorage.setItem("wordstyped", wordstyped);
    localStorage.setItem("accuracy", accuracy.toFixed(2));
    localStorage.setItem("realaccuracy", realaccuracy.toFixed(2));
    localStorage.setItem("incorrectwords", incorrectwords);

    const data = {
        wordstyped: wordstyped,
        accuracy: accuracy,
        realaccuracy: realaccuracy,
        incorrectwords: incorrectwords,
    };
    fetch("/calcresult", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            location.href =
                "/result?hscore=" + encodeURIComponent(data["message"]);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}
function countdownTimer() {
    interval = setInterval(function () {
        time--;
        timertxt.innerHTML = time;
        if (time == 0) {
            clearInterval(interval);
            endtest();
        }
    }, 1000);
}
