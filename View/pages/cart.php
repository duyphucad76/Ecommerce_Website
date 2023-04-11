<style>
  .btn-circle.btn-sm {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    border: none;
  }
</style>
<div class="container-fluid">
  <?php
  if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<h3 class='ml-5 pt-5'>SHOPPING CART IS EMPTY. <a href='index.php?action=product'>GO TO SHOP</a></h3>";
  } else {
  ?>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Variations</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Subtotal Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <form action="index.php?action=cart&act=update" method="post">
          <?php
          $total = 0;
          foreach ($_SESSION['cart'] as $key => $item) {
            $total += $item['subTotal'];
          ?>
            <tr>
              <td scope="row"><img class="img-thumbnail" style="width: 200px;" src="./Assets/images/products/<?php echo $item['image'] ?>" alt=""></td>
              <td class="align-middle"><?php echo $item['name'] ?></td>
              <td class="align-middle"><?php echo "Size: " . $item['size'] . " - Color: " ?><button class="btn-circle btn-sm" style="background-color: <?php echo $item['color'] ?>;"></button></td>
              <td class="align-middle"><input type="text" name="quantity[<?php echo $key ?>]" value="<?php echo $item['quantity'] ?>"></td>
              <td class="align-middle">$<?php echo number_format($item['price'], 2) ?></td>
              <td class="align-middle">$<?php echo number_format($item['subTotal'], 2) ?></td>
              <td class="align-middle"><a href="index.php?action=cart&act=delete&id=<?php echo $key ?>"><button class="btn btn-danger" type="button">Delete</button></a></td>
            </tr>
          <?php } ?>
          <tr>
            <td class="text-right" colspan="5">
              <h3>Total</h3>
            </td>
            <td colspan="2">
              <h3>$<?php echo number_format($total, 2) ?></h3>
            </td>
          </tr>
          <tr>
            <td colspan="3" align="right"><button class="btn btn-success" type="submit">Update</button></td>
        </form>
        <td colspan="4">
          <form action="index.php?action=cart&act=payment" method="post">
            <input type="hidden" name="total" value="<?php echo $total ?>">
            <button class="btn btn-primary" type="submit" name="confirm">Checkout</button>
          </form>
        </td>
        </tr>
      </tbody>
    </table>
  <?php } ?>
</div>