const email = document.querySelector("#email");
         const iconError = document.querySelector(".iconError");
         const iconSuccess = document.querySelector(".iconSuccess");
         const error = document.querySelector(".error-text");
         const btn = document.querySelector("button");
         let regExp = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
         function check(){
           if(email.value.match(regExp)){
             email.style.borderColor = "#27ae60";
             email.style.background = "#eafaf1";
             iconError.style.display = "none";
             iconSuccess.style.display = "block";
             error.style.display = "none";
             btn.style.display = "block";
           }else{
             email.style.borderColor = "#e74c3c";
             email.style.background = "#fceae9";
             iconError.style.display = "block";
             iconSuccess.style.display = "none";
             error.style.display = "block";
             btn.style.display = "none";
           }
           if(email.value == ""){
             email.style.borderColor = "lightgrey";
             email.style.background = "#fff";
             iconError.style.display = "none";
             iconSuccess.style.display = "none";
             error.style.display = "none";
             btn.style.display = "none";
           }
}
         

// var taxRate = 0.05;
// var shippingRate = 15.00; 
// var fadeTime = 300;


// /* Assign actions */
// $('.product-quantity input').change( function() {
//   updateQuantity(this);
// });

// $('.product-removal button').click( function() {
//   removeItem(this);
// });


// /* Recalculate cart */
// function recalculateCart()
// {
//   var subtotal = 0;
  
//   /* Sum up row totals */
//   $('.product').each(function () {
//     subtotal += parseFloat($(this).children('.product-line-price').text());
//   });
  
//   /* Calculate totals */
//   var tax = subtotal * taxRate;
//   var shipping = (subtotal > 0 ? shippingRate : 0);
//   var total = subtotal + tax + shipping;
  
//   /* Update totals display */
//   $('.totals-value').fadeOut(fadeTime, function() {
//     $('#cart-subtotal').html(subtotal.toFixed(2));
//     $('#cart-tax').html(tax.toFixed(2));
//     $('#cart-shipping').html(shipping.toFixed(2));
//     $('#cart-total').html(total.toFixed(2));
//     if(total == 0){
//       $('.checkout').fadeOut(fadeTime);
//     }else{
//       $('.checkout').fadeIn(fadeTime);
//     }
//     $('.totals-value').fadeIn(fadeTime);
//   });
// }


// /* Update quantity */
// function updateQuantity(quantityInput)
// {
//   /* Calculate line price */
//   var productRow = $(quantityInput).parent().parent();
//   var price = parseFloat(productRow.children('.product-price').text());
//   var quantity = $(quantityInput).val();
//   var linePrice = price * quantity;
  
//   /* Update line price display and recalc cart totals */
//   productRow.children('.product-line-price').each(function () {
//     $(this).fadeOut(fadeTime, function() {
//       $(this).text(linePrice.toFixed(2));
//       recalculateCart();
//       $(this).fadeIn(fadeTime);
//     });
//   });  
// }


// /* Remove item from cart */
// function removeItem(removeButton)
// {
//   /* Remove row from DOM and recalc cart total */
//   var productRow = $(removeButton).parent().parent();
//   productRow.slideUp(fadeTime, function() {
//     productRow.remove();
//     recalculateCart();
//   });
// }