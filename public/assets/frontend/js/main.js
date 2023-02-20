var slider = document.getElementById("myRange");
var output = document.getElementById("quantity");
output.value = slider.value;

slider.oninput = function() {
  output.value = this.value;
}
/* Day & Night Mode */
document.querySelectorAll(".mode").forEach(function(e, i){
    e.addEventListener('click', function(){
        document.querySelectorAll(".mode").forEach((e) => {
            if (e === this) {
                e.classList.toggle("active");
            }
        });
    });
});

function checkHawkinsBooster(checkbox){
    if (checkbox.checked)
    {
        document.querySelector("#booster-time").disabled = false;
        document.querySelector("#booster-value").disabled = false;
    } else {
        document.querySelector("#booster-time").disabled = true;
        document.querySelector("#booster-value").disabled = true;
    }
}

function checkSpecialFrequency(checkbox){
    if (checkbox.checked)
    {
        document.querySelector("#special-frequency").disabled = false;
    } else {
        document.querySelector("#special-frequency").disabled = true;
    }
}