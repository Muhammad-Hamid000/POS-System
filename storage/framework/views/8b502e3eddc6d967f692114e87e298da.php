

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('ordere');

$__html = app('livewire')->mount($__name, $__params, 'lw-3951210318-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <div class="modal">
        <div id="print">
            <?php echo $__env->make('reports.receipt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>



    <Style>
        .radio-item {
            display: flex;
            /* Adds space between each radio button */
            align-items: center;
            /* Vertically aligns radio button and label */
        }

        .radio-item input[type="radio"] {
            visibility: hidden;
            height: 20px;
            width: 20px;
            margin: 0 5px 0 5px;
            padding: 0;
            cursor: pointer;
            /* Removes the default margin */
        }

        /*Before style */
        .radio-item input[type="radio"]:before {
            position: relative;
            height: 20px;
            width: 20px;
            margin: 4px -25px -4px 0;
            display: inline-block;
            visibility: visible;
            border-radius: 10px;
            border: 2px inset rgb(150, 150, 150, 0.75);
            background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%,
                    rgb(250, 250, 250) 5%, rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
            content: '';
            cursor: pointer;

            /* Removes the default margin */
        }

        /*after style */
        .radio-item input[type="radio"]:checked:after {
            position: relative;
            top: 0;
            left: 9px;
            height: 12px;
            width: 12px;
            display: inline-block;
            visibility: visible;
            border-radius: 10px;
            background: radial-gradient(ellipse at top left, rgb(240, 255, 220) 0%,
                    rgb(255, 250, 100) 5%, rgb(75, 75, 0) 95%, rgb(25, 100, 0) 100%);
            content: '';
            cursor: pointer;

            /* Removes the default margin */
        }

        .radio-item label {
            display: inline-block;
            margin: 0;
            padding: 0;
            line-height: 25px;
            height: 25px;
            cursor: pointer;
        }

        .radio-item input[type="radio"].true:checked:after {
            background: radial-gradient(ellipse at top left, rgb(240, 255, 220) 0%,
                    rgb(255, 250, 100) 5%, rgb(75, 75, 0) 95%, rgb(25, 100, 0) 100%);

        }

        .radio-item input[type="radio"].false:checked:after {
            background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%,
                    rgb(250, 250, 250) 5%, rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);

        }


        .modal.right .modal-dialog {
            top: 0;
            right: 0;
            margin-right: 20vh;
        }

        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(25%, 0, 0);
            transform: translate3d(25%, 0, 0);
        }

        body {
            font-family: 'Lato';
        }

        input {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            margin: 10px;
            margin-right: 10px;
        }

        button {
            width: 100%;
        }
    </Style>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {

            $('.add_more').on('click', function() {
                var product = $('.product_id').html();
                var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
                var tr = '<tr><td class="no">' + numberofrow + '</td>' +
                    '<td><select class="form-control product_id" name="product_id[]" >' + product + '</select></td>' +
                    '<td><input type="number" name="quantity[]" class="form-control quantity" ></td>' +
                    '<td><input type="number" name="price[]" class="form-control price" ></td>' +
                    '<td><input type="number" name="discount[]" class="form-control discount" ></td>' +
                    '<td><input type="number" name="total_amount[]" class="form-control total_amount" ></td>' +
                    '<td><a class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a></td></tr>';
                $('.addMoreProduct').append(tr);
                calculateRowTotal(tr);
                TotalAmount(); // Update the overall total

            })
            $('.addMoreProduct').delegate('.delete', 'click', function() {
                $(this).parent().parent().remove();

                TotalAmount(); // Update the overall total

            })
            // Helper functions
            function calculateRowTotal(tr) {
                var price = parseFloat(tr.find('.price').val()) || 0;
                var qty = parseFloat(tr.find('.quantity').val()) || 0;
                var disc = parseFloat(tr.find('.discount').val()) || 0;

                // Calculate total amount for the row
                var total_amount = (qty * price) - ((qty * price * disc) / 100);
                tr.find('.total_amount').val(total_amount.toFixed(2)); // Update the row total
            }

            function TotalAmount() {
                //all logic for total of a product here
                var total = 0;
                $('.total_amount').each(function(i, e) {
                    var amount = $(this).val() - 0;
                    total += amount;
                })
                $('.total').html(total);
            }

            $('.addMoreProduct').delegate('.product_id', 'change', function() {
                var tr = $(this).parent().parent();
                var price = tr.find('.product_id option:selected').attr('data-price');
                tr.find('.price').val(price);
                var qty = tr.find('.quantity').val() - 0;
                var disc = tr.find('.discount').val() - 0;
                var price = tr.find('.price').val() - 0;
                var total_amount = (qty * price) - ((qty * price * disc) / 100);
                tr.find('.total_amount').val(total_amount);
                calculateRowTotal(tr);
                TotalAmount(); // Update the overall total

            })
            $('.addMoreProduct').delegate('.quantity, .discount', 'keyup', function() {
                var tr = $(this).closest('tr'); // Get the current row
                //alert(tr);
                var price = parseFloat(tr.find('.price').val()) || 0;
                var qty = parseFloat(tr.find('.quantity').val()) || 0;
                var disc = parseFloat(tr.find('.discount').val()) || 0;

                // Calculate and update total amount
                var total_amount = (qty * price) - ((qty * price * disc) / 100);
                tr.find('.total_amount').val(total_amount.toFixed(2));

                calculateRowTotal(tr);
                TotalAmount(); // Update the overall total
            })
            $('#paid_amount').keyup(function() {
                //alert(1);
                var total = $('.total').html();
                var paid_amount = $(this).val();
                var tot = paid_amount - total;
                $('#balance').val(tot);
            })
            document.querySelector('form').addEventListener('submit', function() {
                // Extract the value from the <b> tag
                const totalValue = document.querySelector('.total').innerText;
                // Set it to the hidden input field
                document.querySelector('#totalInput').value = totalValue;
            });

        });

        //print section
        function printreceiptcontent(el) {
            var data = '<input type="button" id="printPageButton" class="printPageButton" style="display:block;width:100%; border:none; background-color:#008B8B; color:#fff; padding: 14px 28px; font-size:16px; cursor:pointer; text-align:center" value="Print Receipt" onClick="window.print()">';
            data += document.getElementById(el).innerHTML;
            myReceipt = window.open("", "myWin", "left=150 , top=130 ,width=400, height=400");
            myReceipt.screnx = 0;
            myReceipt.screny = 0;
            myReceipt.document.write(data);
            myReceipt.document.title = "Print Receipt";
            myReceipt.focus();
            setTimeout(() => {
                myReceipt.close();
            }, 8000);

        }
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Assignments\ShopPos\resources\views/orders/index.blade.php ENDPATH**/ ?>