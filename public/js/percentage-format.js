const percentageFormat = document.querySelectorAll(".percentage-format");

percentageFormat.forEach(
    (item) =>
        (item.innerHTML = `${Math.round(item.innerHTML)}%`)
);
