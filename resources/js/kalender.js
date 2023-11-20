var agendasDataElement = document.getElementById("days");
var agendas = JSON.parse(agendasDataElement.dataset.agendas);

console.log(agendas);

let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();

let monthNames = [
    "Januari",
    "Februari",
    "Maart",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Augustus",
    "September",
    "Oktober",
    "November",
    "December",
];

let daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

function isLeapYear(year) {
    return (year % 4 == 0 && year % 100 != 0) || year % 400 == 0;
}

// ...

function displayCalendar(month, year) {
    let monthElement = document.getElementById("month");
    let daysElement = document.getElementById("days");
    let yearElement = document.getElementById("year");
    yearElement.textContent = year;
    monthElement.innerHTML =
        monthNames[month] + " <span style='font-size:18px'> " + "</span>";
    daysElement.innerHTML = "";

    let firstDay = (new Date(year, month, 1).getDay() + 6) % 7;

    // Calculate the number of days in the previous month
    let previousMonth = month - 1;
    let previousYear = year;
    if (previousMonth < 0) {
        previousMonth = 11;
        previousYear--;
    }
    let numOfDaysInPreviousMonth = daysInMonth[previousMonth];
    if (previousMonth == 1 && isLeapYear(previousYear)) {
        numOfDaysInPreviousMonth++;
    }

    // Create an array to hold the days of the previous month
    let prevMonthDays = [];

    // Add the last few days of the previous month to the array
    for (let i = firstDay - 1; i >= 0; i--) {
        prevMonthDays.push(
            "<li class='prev-month'>" + (numOfDaysInPreviousMonth - i) + "</li>"
        );
    }

    // Add the days of the previous month to daysElement.innerHTML
    daysElement.innerHTML += prevMonthDays.join("");

    var numOfDays = daysInMonth[month];
    if (month == 1 && isLeapYear(year)) {
        numOfDays++;
    }

    for (var i = 1; i <= numOfDays; i++) {
        let dayClass = "";
        let date = new Date(year, month, i);
        let agendaTitle = "";

        // Check if it's a weekend
        if (date.getDay() === 6 || date.getDay() === 0) {
            dayClass = "weekend";
        }

        // Check if the date is between 'datefrom' and 'dateto' from the agendas
        let foundAgenda = agendas.find((agenda) => {
            if (
                new Date(agenda.datefrom).toDateString() === date.toDateString()
            ) {
                agendaTitle = agenda.title;
                return true;
            } else if (
                date >= new Date(agenda.datefrom) &&
                date <= new Date(agenda.dateto)
            ) {
                agendaTitle = agenda.title;
                return true;
            }
            return false;
        });

        if (foundAgenda) {
            dayClass += " green-day";
        }

        // Display the date number and the agenda title within the `<li>` element, with the title at the bottom and slight padding
        if (agendaTitle) {
            daysElement.innerHTML +=
                "<li class='" +
                dayClass +
                "' style='position: relative;'><span style='position: absolute; bottom: 0px; padding-bottom: 1rem;;'>" +
                agendaTitle +
                "</span>" +
                i +
                "</li>";
        } else {
            daysElement.innerHTML +=
                "<li class='" + dayClass + "' >" + i + "</li>";
        }
    }

    // Display the first few days of the next month
    let nextDay = (new Date(year, month, numOfDays).getDay() + 6) % 7;
    for (let i = 1; i <= 6 - nextDay; i++) {
        daysElement.innerHTML += "<li class='next-month'>" + i + "</li>";
    }
}

window.previousMonth = function () {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    displayCalendar(currentMonth, currentYear);
};

window.nextMonth = function () {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    displayCalendar(currentMonth, currentYear);
};

displayCalendar(currentMonth, currentYear);
