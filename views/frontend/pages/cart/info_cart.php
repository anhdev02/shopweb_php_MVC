<div onload="myFunction()" style = "overflow:auto">
    <div style = "float:left; width: 40%; margin-left: 100px;">
        <h1 style="font-size: 50" >THÔNG TIN CỦA BẠN</h1>
        <form action="<?= URL ?>index.php/frontend/saveCart" method = "post">
        <fieldset>
            <table>
                <tr>
                    <td>Họ tên</td>
                    <td><input value="<?= $_SESSION['fullname'] ?>"  name="name" type="text"></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input value="<?= $_SESSION['address'] ?>"  name="address" type="text"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input value="<?= $_SESSION['email'] ?>"  name="email" type="text"></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td><input value="<?= $_SESSION['phone'] ?>"  name="phone" type="text"></td>
                </tr>
            </table>
            <input onclick = "pay()" type="submit" value = "Chốt đơn">
            <script>
                function pay(){
                    alert("Thanh toán thành công");
                }
            </script>
            </fieldset>
        </form>
    </div>
    <div style = "float:left; margin-left: 200px;">
    <h1 style="font-size: 50" >ORDERLIST</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>Product</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Total</th>
            </tr>
        <?php if($data['cart']!=null){ $i = -1; $gtotal = 0; foreach($data['cart'] as $value): $i++; $_SESSION['amountcart'][$i] = $_POST["amount$i"] ?>
            <script>
                        // var gt = 0;
                        // var iprice = document.getElementsByClassName('iprice');
                        // var iquatity = document.getElementsByClassName('iquatity');
                        // var itotal = document.getElementsByClassName('itotal');
                        // var gtotal = document.getElementById('gtotal');

                        // function subTotal(){
                        //     gt = 0;
                        //     for(i=0; i < iprice.length; i++){

                        //         itotal[i].innerText=(iprice[i].value)*(iquatity[i].value);
                        //         gt = gt + (iprice[i].value)*(iquatity[i].value);
                        //     }
                        //     gtotal.innerText = gt;
                        // }
                        function myFunction(){

                            for(i=0; i < iprice.length; i++){
                                alert(iquatity[i].value);
                                iquatity.innerText=iquatity[i].value;
                                itotal.innerText=(iprice[i].value)*(iquatity[i].value);
                            }
                        }
                        alert(amount[$i]);
                        // subTotal();
            </script>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $value['product_name'] ?></td>
                        <td><?php echo "<span>".number_format($value['price'],0,",",".")."<sup> <u>đ</u></sup></span>";?></td>
                        <td><input class = "iquatity" type="text" value=<?php echo $_SESSION['amountcart'][$i];?> class="field left" readonly></td>
                        <td>
                            <?php $itotal =$_SESSION['amountcart'][$i]*$value['price'];  echo "<span class = 'itotal'>$itotal</span>"; ?>
                            <sup> <u>đ</u></sup>
                        </td>
                    </tr>
        <?php  $gtotal = $gtotal + $itotal;  endforeach; }else{ echo "Không có sản phẩm nào trong giỏ hàng!"; } ?>
        <tr>
            <td colspan = "4"><h2>Total: </h2></td>
            <td><?php echo $gtotal; ?><sup> <u>đ</u></sup> </td>
        </tr>
        </table>
    </div>
</div>
