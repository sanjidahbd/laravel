
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Menu</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        td, th {
            text-align: center;
            vertical-align: middle;
        }
        .qty {
            width: 50px;
            text-align: center;
        }
    </style>
</head>
<body class="p-4">

<div class="container">
    <h2 class="text-center mb-4">🍽️ Food Menu</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>SL</th>
            <th>Image</th>
            <th>Food Name</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Short Desc</th>
            <th>Availability</th>
             <th>Price ($)</th>
              <th>Quantity</th>
               <th>Action</th>


        </tr>
        </thead>

        <tbody>
        <tr>
            <td>Burger</td>
            <td>Cheas Burger</td>
            <td>Yes</td>
            <td class="price">5</td>
            <td>
                <button class="btn btn-sm btn-danger minus">-</button>
                <input type="text" class="qty" value="1" readonly>
                <button class="btn btn-sm btn-success plus">+</button>
            </td>
            <td class="subtotal">5</td>
            <td>
                <button class="btn btn-primary add">Add to Cart</button>
            </td>
        </tr>

        <tr>
            <td>Pizza</td>
            <td>8" inch 6 slice</td>
            <td>No</td>
            <td class="price">3.5</td>
            <td>
                <button class="btn btn-sm btn-danger minus">-</button>
                <input type="text" class="qty" value="1" readonly>
                <button class="btn btn-sm btn-success plus">+</button>
            </td>
            <td class="subtotal">3.5</td>
            <td>
                <button class="btn btn-primary add">Add to Cart</button>
            </td>
        </tr>
        </tbody>
    </table>

    <h4 class="text-end">Total: $<span id="total">0</span></h4>
</div>

<script>
$(document).ready(function(){

    function updateSubtotal(row){
        let price = parseFloat(row.find('.price').text());
        let qty = parseInt(row.find('.qty').val());
        let subtotal = price * qty;
        row.find('.subtotal').text(subtotal.toFixed(2));
    }

    function updateTotal(){
        let total = 0;
        $('.subtotal').each(function(){
            total += parseFloat($(this).text());
        });
        $('#total').text(total.toFixed(2));
    }

    $('.plus').click(function(){
        let row = $(this).closest('tr');
        let qty = row.find('.qty');
        qty.val(parseInt(qty.val()) + 1);
        updateSubtotal(row);
        updateTotal();
    });

    $('.minus').click(function(){
        let row = $(this).closest('tr');
        let qty = row.find('.qty');
        if(qty.val() > 1){
            qty.val(parseInt(qty.val()) - 1);
            updateSubtotal(row);
            updateTotal();
        }
    });

    $('.add').click(function(){
        updateTotal();
        alert("Item added to cart!");
    });

});
</script>

</body>
</html>
