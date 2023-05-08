const minusBtn = document.querySelector(".select__number--minus");
const plusBtn = document.querySelector(".select__number--plus");


/**
 * Hàm tăng số lượng
 * Author: THINHDH(12/04/2023)
 */
function increaseQuantity() {
    var valueNumber = document.querySelectorAll(".select__number--value");
    for (let index = 0; index < valueNumber.length; index++) {
      var number = parseFloat(valueNumber[index].getAttribute("value")); 
      valueNumber[index].setAttribute("value", number + 1);
    }
}

/**
 * Hàm giảm số lượng
 * Author: THINHDH(12/04/2023)
 */
function decreaseQuantity() {
  var valueNumber = document.querySelectorAll(".select__number--value");
  for (let index = 0; index < valueNumber.length; index++) {
    var number = parseFloat(valueNumber[index].getAttribute("value")); 
    if (number > 1) {
      valueNumber[index].setAttribute("value", number - 1);
    }
  }
}