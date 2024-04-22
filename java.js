//variables
let oud = document.getElementById("oudePrecentage");
let nieuw = document.getElementById("nieuwePrecentage");
let percentage = document.getElementById("percentage");
let vermenigvuldigingsfactor = document.getElementById("vermenigvuldigingsfactor");
let delingsfactor = document.getElementById("delingsfactor");
let soort = document.getElementById("soort");
let factuur = 0


function checkInput() {
    if (oud.value != '') {
        oud.classList.remove("is-invalid")
        oud.classList.add("is-valid")
    } else {
        oud.classList.add("is-invalid")
        oud.classList.remove("is-valid")
    }

    if (nieuw.value != '') {
        nieuw.classList.remove("is-invalid")
        nieuw.classList.add("is-valid")
    } else {
        nieuw.classList.add("is-invalid")
        nieuw.classList.remove("is-valid")
    }

    if (percentage.value != '') {
        percentage.classList.remove("is-invalid")
        percentage.classList.add("is-valid")
    } else {
        percentage.classList.add("is-invalid")
        percentage.classList.remove("is-valid")
    }
    if (soort.value != '') {
        soort.classList.remove("is-invalid")
        soort.classList.add("is-valid")
    } else {
        soort.classList.add("is-invalid")
        soort.classList.remove("is-valid")
    }

    if (soort.value != "" && percentage.value != "") {
        if (soort.value == 1) {
            factuur = percentage.value / 100;
        }
        else if (soort.value == 2) {
            factuur = 1 + percentage.value / 100;
        }
        else {
            factuur = 1 - percentage.value / 100;
        }

    }
    
    if (oud.value != '' && percentage.value != '' && nieuw.value != '' && factuur != '') {
        document.getElementById("button2").disabled = false;
    }
    else {
        document.getElementById("button2").disabled = true
    }

    vermenigvuldigingsfactor.value = factuur;
    delingsfactor.value = factuur;


    if ((oud.value != '' && nieuw.value != '') || (oud.value != '' && soort.value != '' && percentage.value != '') || (nieuw.value != '' && soort.value != '' && percentage.value != '')) {
        document.getElementById("button").disabled = false
    }
    else {
        document.getElementById("button").disabled = true

    }
}

function solveProblem() {
    if (oud.value != '' && soort.value != '' && percentage.value != '') {
        nieuw.value = oud.value * factuur
    }
    else if (nieuw.value != '' && soort.value != '' && percentage.value != '') {
        oud.value = nieuw.value / factuur
    }
    else {
        factuur = nieuw.value / oud.value
        vermenigvuldigingsfactor.value = factuur
        delingsfactor.value = factuur

        if (factuur > 1) {
            soort.value = 2
            percentage.value = ((factuur - 1) * 100).toFixed(2)
        }
        else {
            soort.value = 3
            percentage.value = ((1 - factuur) * 100).toFixed(2)

        }


        if (oud.value != '') {
            oud.classList.remove("is-invalid")
            oud.classList.add("is-valid")
        } else {
            oud.classList.add("is-invalid")
            oud.classList.remove("is-valid")
        }

        if (nieuw.value != '') {
            nieuw.classList.remove("is-invalid")
            nieuw.classList.add("is-valid")
        } else {
            nieuw.classList.add("is-invalid")
            nieuw.classList.remove("is-valid")
        }

        if (percentage.value != '') {
            percentage.classList.remove("is-invalid")
            percentage.classList.add("is-valid")
        } else {
            percentage.classList.add("is-invalid")
            percentage.classList.remove("is-valid")
        }
        if (soort.value != '') {
            soort.classList.remove("is-invalid")
            soort.classList.add("is-valid")
        } else {
            soort.classList.add("is-invalid")
            soort.classList.remove("is-valid")
        }


        nieuw.disabled = true;
        soort.disabled = true;
        percentage.disabled = true;
        oud.disabled = true;
        document.getElementById("button").disabled = true
    }
}

function reset() {
    oud.value = ''
    nieuw.value = ''
    percentage.value = ''
    vermenigvuldigingsfactor = ''
    

}