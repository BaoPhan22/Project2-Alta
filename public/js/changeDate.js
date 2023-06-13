const sdate = document.querySelector("#sd");
const edate = document.querySelector("#ed");

function setUrl(sd = null, yd = null) {
    if(yd==null) return (url = `report/${sd}`);
    return (url = `report/${sd}/${yd}`);
}

let urlToGo = '';

sdate.addEventListener("change", (e) => {
    urlToGo = setUrl(e.target.value);
    // window.location.href = urlToGo;
});


edate.addEventListener("change", (e) => {
    urlToGo+=`/${e.target.value}`;
    window.location.href = urlToGo;
});
