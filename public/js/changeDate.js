const sdate = document.querySelector("#sd");
const edate = document.querySelector("#ed");

console.log(sdate.value);

let startDateToGo = "";
let endDateToGo = "";

const goToReport = () => {
    if (startDateToGo != "" && endDateToGo != "") {
        window.location.href = `http://127.0.0.1:8000/report/${startDateToGo}/${endDateToGo}`;
    }
}

sdate.addEventListener("change", (e) => {
    startDateToGo = e.target.value;

    goToReport();
});

edate.addEventListener("change", (e) => {
    endDateToGo = e.target.value;

    goToReport();
});
