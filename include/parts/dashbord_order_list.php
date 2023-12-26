<?php
/**
* Template Name: Display Latest 5 Orders
* */

$order = get_orders('LIMIT 5');

?>

<div class="table-responsive">
  <!-- Projects table -->
  <table class="table align-items-center table-flush">
    <thead class="thead-light">
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Suite Name</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($order_row = $order->fetch(PDO::FETCH_ASSOC) ) {
        ?>
        <tr>
          <th scope="row">#<?php echo $order_row['order_no']; ?></th>
          <td><?php get_suite_title( $order_row['suite_id'] ); ?></td>
          <td><?php echo date("d M, Y", strtotime($order_row['check_in'])); ?></td>
          <td class="text-center">
            <?php if ($order_row['status'] == 1) { ?>
              <span class="badge badge-dot">
                <i class="bg-success"></i>
              </span>
            <?php } else { ?>
              <span class="badge badge-dot">
                <i class="bg-warning"></i>
              </span>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>