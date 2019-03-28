$(document).ready(function () {
    $("#inputFile").on("change", function () {
        console.log(this.value)
        $('#fileName').val(this.value)
    });
}); 