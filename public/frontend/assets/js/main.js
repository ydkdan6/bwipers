// script.js

// Wait for the page to finish loading
window.addEventListener('load', function() {
    // Get the preloader element
    var preloader = document.querySelector('.preloader');

    // Set the time interval (in milliseconds) before hiding the preloader
    var delayTime = 2000; // 2000 milliseconds = 2 seconds

    // Hide the preloader after the delay
    setTimeout(function() {
        preloader.classList.add('hide');
    }, delayTime);
});

let actualPrice =  640;
let deliveryPay = 1000;

// function onInputCount() {
//     const quantityInput = document.getElementById('quantity');
//     quantityInput.value = parseInt(quantityInput.value);
//     updateTotalPrice();
// }

// function increaseCount() {
//     const quantityInput = document.getElementById('quantity');
//     quantityInput.value = parseInt(quantityInput.value) ;
//     updateTotalPrice();
// }

// function decreaseCount() {
//     const quantityInput = document.getElementById('quantity');
//     quantityInput.value = parseInt(quantityInput.value); // Ensure quantity is not negative
//     updateTotalPrice();
// }

// function updateTotalPrice() {
//     const quantity = parseInt(document.getElementById('quantity').value);
//     // alert(quantity)
//     const totalPrice = actualPrice * quantity;
//     document.getElementById('subTotal').textContent = "#" + totalPrice;
//     document.getElementById('mainSubTotal').textContent = "#" + totalPrice;

//     const checkPay = document.getElementById('free-shipping');

//     if (checkPay.checked) {
//         const subTotalWithDelivery = totalPrice + deliveryPay;
//         document.getElementById('mainTotal').textContent = "#" + subTotalWithDelivery;
//     } else {
//         document.getElementById('mainTotal').textContent = "#" + totalPrice;
//     }
// }

function checkPay() {
    const checkPay = document.getElementById('free-shipping');
    if (checkPay.checked) {
        addDelivery();
    } else {
        updateTotalPrice();
    }
}

function addDelivery() {
    const quantity = parseInt(document.getElementById('quantity').value);
    const totalPrice = actualPrice * quantity;
    const subTotalWithDelivery = totalPrice + deliveryPay;
    document.getElementById('mainTotal').textContent = "#" + subTotalWithDelivery;
}
function freeDelivery() {
    const checkPay = document.getElementById('free-shipping');
    if(checkPay.checked) {
        addDelivery()
    }
    else {
        updateTotalPrice();
    }
}
