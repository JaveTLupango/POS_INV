/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */
function funcAddOrderCart() {
    debugger;
    var orderid = document.getElementById("OrderID").value;
    var productid = document.getElementById("ProductID").value;
    var qty = document.getElementById("qtyoforder").value;
    $.ajax({
        type: "POST",
        url: "class/api.function2.php",
        data: {
            id = "addordercart",
            data1: orderid,
            data2: productid,
            data3: qty
        },
        success: function(resp) {
            alert(resp);
        }
    });
}