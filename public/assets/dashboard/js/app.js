(function ($) {
  // sidebar collapsing
  if (window.innerWidth <= 1364) {
    $(".page-container").addClass("sbar_collapsed");
  }
  $(".nav-btn").on("click", function () {
    $(".page-container").toggleClass("sbar_collapsed");
  });
})(jQuery);


// Animation
AOS.init({
  duration: 1000,
});



// // Service 1

// function  subscriptionValueSelector() {
//   let subscriptionValue = document.getElementById("subscriptionDuration").value;
//   let valueStatus = document.getElementById("subscriptionAmount").value;
//   let addValue = document.querySelector(".add-value");
//   // let deleteValue = document.querySelector("#deleteValue");
//   let textValue = document.getElementById("textValue");

//   addValue.onclick = function () {
//     if(subscriptionValue && valueStatus) {
//       // textValue.innerHTML += `${subscriptionValue} ${valueStatus}`;
//       var values = `<p class="price__field">${subscriptionValue} ${valueStatus}   <span class="deleteBtn"><i class="bi bi-dash-circle"></i></span> </p>`;
//       textValue.innerHTML += values;
//       let priceField = document.querySelectorAll(".price__field");
//       let deleteBtn = document.querySelectorAll(".deleteBtn");
//       for(let i = 0; i < deleteBtn.length; i++){
//           deleteBtn[i].addEventListener("click", ()=>{
//             priceField[i].remove();
//          });
//       }
//     }
//   }

// };




// function dataFields() {



//   let addDataBtn = document.querySelector(".addDataBtn");



//   addDataBtn.onclick = function () {
//     let inputDataFields = document.querySelector("#inputDataFields").value;
//     let requiredFields = document.getElementById("requiredField");
//     let dataFields = document.getElementById("datafield");
//     let showValue = document.querySelector("#showValue");
//     let input = document.createElement("input");
//     input.setAttribute("type", "text");

//     let tr = document.createElement("tr");
//     let th = document.createElement("th");
//     let td = document.createElement("td");

//     let data = document.querySelector(".data");

//     if(requiredFields.value == "required"){
//       input.setAttribute("required", "");
//       var tableRow = data.innerHTML += ` <td>${inputDataFields} *</td>`;
//     } else {
//       input.removeAttribute("required");
//       data.innerHTML += `<span>${inputDataFields}  </span>`;
//     }


//     if(dataFields.value == "text"){
//       input.setAttribute("type", "text");
//     }
//      else if(dataFields.value == "date"){
//       input.setAttribute("type", "date");
//     }
//      else if(dataFields.value == "number"){
//       input.setAttribute("type", "number");

//     }else if(dataFields.value == "textarea"){
//       input.setAttribute("class", "textarea");

//     }
//     data.appendChild(input);

//   }

// };






// Add user





















