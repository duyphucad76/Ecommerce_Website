<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="./assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="./assets/jquery-1.11.3.min.js"></script>
</head>

<body>
    <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    $vnp_TmnCode = "QQHXBSIZ"; //Website ID in VNPAY System
    $vnp_HashSecret = "DSOCYZGBEUEZBLNFHSVJBINSEFNNSJXX"; //Secret key
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost/PHP/PHP2/EcommerceWebsite/Model/payment/vnpay_php/vnpay_return.php";
    $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
    //Config input format
    //Expire
    $startTime = date("YmdHis");
    $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $value['subTotal'];
        }
        $total *= 22000;
    }
    if (isset($_SESSION['user'])) {
        $user = new user();
        $set = $user->checkUserEmail($_SESSION['user']['email']);
    }
    ?>
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">Payment</h3>
        </div>
        <div class="table-responsive">
            <form action="index.php?action=payment" id="create_form" method="post">
                <div class="form-group">
                    <label for="language">Loại hàng hóa </label>
                    <select name="order_type" id="order_type" class="form-control">
                        <option value="fashion" selected>Thời trang</option>
                        <option value="other">Khác - Xem thêm tại VNPAY</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order_id">Mã hóa đơn</label>
                    <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>" />
                </div>
                <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input class="form-control" id="amount" name="amount" type="number" value="<?php echo $total ?>" />
                </div>
                <div class="form-group">
                    <label for="order_desc">Nội dung thanh toán</label>
                    <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Thanh toan hoa don Cara Shop</textarea>
                </div>
                <div class="form-group">
                    <label for="bank_code">Ngân hàng</label>
                    <select name="bank_code" id="bank_code" class="form-control">
                        <option value="">Không chọn</option>
                        <option value="NCB"> Ngan hang NCB</option>
                        <option value="AGRIBANK"> Ngan hang Agribank</option>
                        <option value="SCB"> Ngan hang SCB</option>
                        <option value="SACOMBANK">Ngan hang SacomBank</option>
                        <option value="EXIMBANK"> Ngan hang EximBank</option>
                        <option value="MSBANK"> Ngan hang MSBANK</option>
                        <option value="NAMABANK"> Ngan hang NamABank</option>
                        <option value="VNMART"> Vi dien tu VnMart</option>
                        <option value="VIETINBANK">Ngan hang Vietinbank</option>
                        <option value="VIETCOMBANK"> Ngan hang VCB</option>
                        <option value="HDBANK">Ngan hang HDBank</option>
                        <option value="DONGABANK"> Ngan hang Dong A</option>
                        <option value="TPBANK"> Ngân hàng TPBank</option>
                        <option value="OJB"> Ngân hàng OceanBank</option>
                        <option value="BIDV"> Ngân hàng BIDV</option>
                        <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                        <option value="VPBANK"> Ngan hang VPBank</option>
                        <option value="MBBANK"> Ngan hang MBBank</option>
                        <option value="ACB"> Ngan hang ACB</option>
                        <option value="OCB"> Ngan hang OCB</option>
                        <option value="IVB"> Ngan hang IVB</option>
                        <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="language">Ngôn ngữ</label>
                    <select name="language" id="language" class="form-control">
                        <option value="vn" selected>Tiếng Việt</option>
                        <option value="en">English</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Thời hạn thanh toán</label>
                    <input class="form-control" id="txtexpire" name="txtexpire" type="text" value="<?php echo $expire; ?>" />
                </div>
                <div class="form-group">
                    <h3>Thông tin hóa đơn (Billing)</h3>
                </div>
                <div class="form-group">
                    <label>Họ tên (*)</label>
                    <input class="form-control" id="txt_billing_fullname" name="txt_billing_fullname" type="text" value="<?php echo $set['name'] ?>" />
                </div>
                <div class="form-group">
                    <label>Email (*)</label>
                    <input class="form-control" id="txt_billing_email" name="txt_billing_email" type="text" value="<?php echo $set['email'] ?>" />
                </div>
                <div class="form-group">
                    <label>Số điện thoại (*)</label>
                    <input class="form-control" id="txt_billing_mobile" name="txt_billing_mobile" type="text" value="<?php echo $set['phone'] ?>" />
                </div>
                <div class="form-group">
                    <label>Địa chỉ (*)</label>
                    <input class="form-control" id="txt_billing_addr1" name="txt_billing_addr1" type="text" value="<?php echo $set['address'] ?>" />
                </div>
                <div class="form-group">
                    <label>Mã bưu điện (*)</label>
                    <input class="form-control" id="txt_postalcode" name="txt_postalcode" type="text" value="100000" />
                </div>
                <div class="form-group">
                    <label>Tỉnh/TP (*)</label>
                    <input class="form-control" id="txt_bill_city" name="txt_bill_city" type="text" value="Tp Hồ Chí Minh" />
                </div>
                <div class="form-group">
                    <label>Bang (Áp dụng cho US,CA)</label>
                    <input class="form-control" id="txt_bill_state" name="txt_bill_state" type="text" value="" />
                </div>
                <div class="form-group">
                    <label>Quốc gia (*)</label>
                    <input class="form-control" id="txt_bill_country" name="txt_bill_country" type="text" value="VN" />
                </div>
                <div class="form-group">
                    <h3>Thông tin gửi Hóa đơn điện tử (Invoice)</h3>
                </div>
                <div class="form-group">
                    <label>Tên khách hàng</label>
                    <input class="form-control" id="txt_inv_customer" name="txt_inv_customer" type="text" value="<?php echo $set['name'] ?>" />
                </div>
                <div class="form-group">
                    <label>Công ty</label>
                    <input class="form-control" id="txt_inv_company" name="txt_inv_company" type="text" value="Công ty TNHH MTV" />
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" id="txt_inv_addr1" name="txt_inv_addr1" type="text" value="<?php echo $set['address'] ?>" />
                </div>
                <div class="form-group">
                    <label>Mã số thuế</label>
                    <input class="form-control" id="txt_inv_taxcode" name="txt_inv_taxcode" type="text" value="0102182292" />
                </div>
                <div class="form-group">
                    <label>Loại hóa đơn</label>
                    <select name="cbo_inv_type" id="cbo_inv_type" class="form-control">
                        <option value="I">Cá Nhân</option>
                        <option value="O">Công ty/Tổ chức</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" id="txt_inv_email" name="txt_inv_email" type="text" value="pholv@vnpay.vn" />
                </div>
                <div class="form-group">
                    <label>Điện thoại</label>
                    <input class="form-control" id="txt_inv_mobile" name="txt_inv_mobile" type="text" value="02437764668" />
                </div>
                <button type="submit" name="redirect" id="redirect" class="btn btn-primary">Thanh toán VNPAY</button>
                <div id="paypal-button"></div>
            </form>
        </div>
    </div>


    <script src="https://www.paypal.com/sdk/js?client-id=AXeTcZBcOhITcbEOlJe3RdTtlBd1dkT5DiEmSBlyrDr7NkXItpDHbIdZ-kjBXxG0aWZtQmi7Vm-kemJ1" 
    data-uid-auto="uid_vugnzbbvzddjzfdisewywfrqccypzs"></script>
    <script type="text/javascript">
        paypal.Buttons({
            createOrder(data, actions) {
                return actions.order.create({
                    "purchase_units": [{
                        "amount": {
                            "currency_code": "USD",
                            "value": "<?php echo ($total / 22000)?>",
                            "breakdown": {
                                "item_total": {
                                    /* Required when including the `items` array */
                                    "currency_code": "USD",
                                    "value": "<?php echo ($total / 22000)?>"
                                }
                            }
                        },
                        "items": [{
                            "name": "Cartoon T-Shirt",
                            /* Shows within upper-right dropdown during payment approval */
                            "description": "Optional descriptive text..",
                            /* Item details will also be in the completed paypal.com transaction view */
                            "unit_amount": {
                                "currency_code": "USD",
                                "value": "<?php echo ($total / 22000)?>"
                            },
                            "quantity": "1"
                        }, ]
                    }]
                })
            },
            onApprove(data, actions) {
                return actions.order.capture().then((details) => {
                    console.log(details);
                    if (confirm("Thank you for your purchase !!!")) location.href = "index.php";
                })
            },
            onCancel(data) {
                alert("Payment cancelled");
            },
            onError(err) {
                alert("Something went wrong with the address information that prevented the checkout");
            }
        }).render("#paypal-button")
    </script>
</body>

</html>