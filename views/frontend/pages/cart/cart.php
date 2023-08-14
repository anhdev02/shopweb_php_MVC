<!-- onchange = "document.getElementById('demo<?= $i?>').innerHTML= document.querySelector('#soluong<?= $i?>').value*<?= $value['price'] ?>; document.getElementById('total').innerHTML= document.querySelector('#soluong2').value*<?= $value['price'] ?> + document.querySelector('#soluong1').value*<?= $value['price'] ?> + document.querySelector('#soluong3').value*<?= $value['price'] ?> ;" -->
<form action="infoCart" method = "post">  
<center><h1>Cart</h1></center>
            <table>
                <theader>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Total</th>
                    <th>Delete</th>
                </tr>
            </theader>
            <tbody>
                <?php $i = -1; $s = 0; if($data['cart']==null){
                    echo "<center><h2>Khong co san pham trong gio hang</h2></center>";
                }else{  foreach($data['cart'] as $value): $i++; ?>
                    <tr>
                        <td><?= $value['product_name'] ?></td>
                        <td><img width="100" height="100" src="<?= URL ?>asset/frontend/images/<?= $value['image']?>" ></td>
                        <td><?php echo "<span>".number_format($value['price'],0,",",".")."<sup> <u>đ</u></sup></span>";?><input type = "hidden" class = "iprice" value = '<?= $value['price'] ?>' > </td>
                        <td>
                            
                                 <input name=<?php echo "amount".$i; ?> onchange = 'subTotal(); Amount()' min = "1" max = "99" style="min-width:1px;" value = "1" type = "number" class = "iquatity"> 
                                <input type="hidden" name = "item_name" value="<?= $value['product_name']?>" >
                           
                        </td>
                        <td>
                            <?php echo "<span class = 'itotal'></span>"; ?>
                            <sup> <u>đ</u></sup>
                        </td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa không ?')" href="<?= URL ?>index.php/frontend/delCart/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
                    </tr>
                <?php  endforeach; } ?>
                    <tr>
                        <td colspan = "4"><h2>Total</h2></td>
                        <td><span id = "gtotal"></span><sup> <u>đ</u></sup></td>
                        <td><a onclick="return confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng không ?')" href="<?= URL ?>index.php/frontend/delCartfull"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
                    </tr> 
                    <tr>
                        <td colspan = "5"></td>                          
                        <td><a href="<?= URL ?>index.php/frontend/infoCart"><button type = "submit"  style = "background-color: blue; color: white;">Thanh Toán</button></a></td>
                    </tr> 
                    <script>
                        var gt = 0;
                        var iprice = document.getElementsByClassName('iprice');
                        var iquatity = document.getElementsByClassName('iquatity');
                        var itotal = document.getElementsByClassName('itotal');
                        var gtotal = document.getElementById('gtotal');
                        function subTotal(){
                            gt = 0;
                            for(i=0; i < iprice.length; i++){

                                itotal[i].innerText=(iprice[i].value)*(iquatity[i].value);
                                gt = gt + (iprice[i].value)*(iquatity[i].value);
                                // alert(iquatity[i]);
                            }
                            gtotal.innerText = gt;
                        }
                        subTotal();
                    </script>
            </tbody>
        </table>
    </form>



