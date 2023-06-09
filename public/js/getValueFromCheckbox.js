    // get value from checkbox vanila js
    var autoIncreasing = document.getElementById("autoIncreasing");
    var prefix = document.getElementById("prefix");
    var surfix = document.getElementById("surfix");
    var resetByDay = document.getElementById("resetByDay");
    var from = document.getElementById("from");
    var to = document.getElementById("to");

    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName("rule");
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false;
        });
    }

    autoIncreasing.addEventListener("change", () => {
        if (autoIncreasing.checked) {
            prefix.checked = true;
            from.disabled = false;
            to.disabled = false;
            surfix.disabled = false;
            prefix.disabled = false;
            resetByDay.disabled = false;
        } else {
            prefix.checked = false;
            from.disabled = true;
            to.disabled = true;
            resetByDay.checked = false;
            surfix.checked = false;
            surfix.disabled = true;
            prefix.disabled = true;
            resetByDay.disabled = true;
        }
    });
