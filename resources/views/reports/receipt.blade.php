<div id="invoice-POS">


    <div class="printed_content">
        <center id="top">
            <div class="logo">Hamid Store</div>
            <div class="info"></div>
            <h2>POS Ltd</h2>
        </center>
    </div>

    <div class="mid">
        <div class="info">
            <h2>Contact Us</h2>
            <p>
                Address: Kallar Syedan,
                Email: shop@gmail.com,
                Phone: 051-3570911
            </p>
        </div>
        <!--End of Receipt Mid -->

        <div class="bot">
            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Item</h2>
                        </td>
                        <td class="hours">
                            <h2>Qty</h2>
                        </td>
                        <td class="rate">
                            <h2>unit</h2>
                        </td>
                        <td class="rate">
                            <h2>Discount</h2>
                        </td>
                        <td class="rate">
                            <h2>Sub Total</h2>
                        </td>
                        <td></td>
                    </tr>
                    @foreach($order_receipt as $receipt)

                    <tr>
                        <td class="tableitem">
                            <p class="itemtext"> {{ $receipt->product->product_name}}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext"> {{ $receipt->quality }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext"> {{ number_format($receipt->unitprice,2) }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext"> {{ $receipt->discount }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext"> {{ number_format($receipt->amount,2) }}</p>
                        </td>
                    </tr>

                    @endforeach

                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="rate">
                            <p class="itemtext"> Tax</p>
                        </td>
                        <td class="payment">
                            <p class="itemtext"></p>
                        </td>
                    </tr>
                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="rate">
                            <h2>Total</h2>
                        </td>
                        <td class="payment">
                            <h2>
                                {{ number_format($receipt->sum('amount'),2) }}
                            </h2>
                        </td>
                    </tr>

                </table><br>
                <div class="legalcopy">
                    <p class="legal"> <strong>** Thank You For Shoping Here **</strong>
                        <br>
                        The Good Can only be Exchanged not Returned within 2 days
                    </p>
                </div>
                <div class="serial-number">
                    Serial : <span class="serial">1245678909</span>
                </div>
                <span> 14/01/2025 &nbsp; &nbsp; 00: 45</span>

            </div>

        </div>

    </div>
</div>

<style>
    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 58mm;
        background: #fff;
    }

    #invoice-POS::selection {
        background: #34495e;
        color: #fff;
    }

    #invoice-POS::-moz-selection {
        background: #34495e;
        color: #fff;

    }

    #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
    }

    #invoice-POS h2 {
        font-size: 0.9em;
    }

    #invoice-POS h3 {
        font-size: 1.5em;
        font-weight: 300;
        line-height: 2em;
    }

    #invoice-POS p {
        font-size: 0.7em;
        line-height: 1.2em;
        color: #666;
    }

    #invoice-POS #top,
    #invoice-POS #mid,
    #invoice-POS #bot {
        border-bottom: 1px solid #eee;
    }

    #invoice-POS #top {
        min-height: 100px;
    }

    #invoice-POS #mid {
        min-height: 80px;
    }

    #invoice-POS #bot {
        min-height: 50px;
    }

    .legalcopy {
        text-align: center;
    }

    #invoice-POS #top .logo {
        height: 60px;
        width: 60px;
        background-image: url() no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    #invoice-POS .info {
        display: block;
        margin-left: 0;
        text-align: center;
    }

    #invoice-POS .title {
        text-align: right;
    }

    #invoice-POS .title p {
        text-align: right;
    }

    #invoice-POS table {
        width: 100%;
        border-collapse: collapse;

    }

    #invoice-POS .tabletitle {
        font-size: 0.5em;
        background: #eee;

    }

    #invoice-POS .service {
        border-bottom: 1px solid #eee;
    }

    #invoice-POS .item {
        width: 24mm;
    }

    #invoice-POS .itemtext {
        font-size: 0.5em;
    }

    .serial-number {
        margin-top: 5mm;
        margin-bottom: 2mm;
        text-align: center;
        font-size: 12px;
    }

    .serial {
        font-size: 10px !important;
    }
</style>