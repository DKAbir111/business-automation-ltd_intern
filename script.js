function submitForm() {
    var carType = document.getElementById("carType").value;
    var electricFields = document.getElementById("electricFields");
    var gasFields = document.getElementById("gasFields");

    if (carType === "Electric") {
        electricFields.style.display = "block";
        gasFields.style.display = "none";
    } else if (carType === "Gas") {
        electricFields.style.display = "none";
        gasFields.style.display = "block";
    }
}

$(document).ready(function() {
    $('#carTable').DataTable();
});

