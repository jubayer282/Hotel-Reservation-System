<?php
/**
* Template Name: Display All Orders List
* */

$order = get_orders();

?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Suite Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Room No</th>
                            <th scope="col">Guset</th>
                            <th scope="col">Total Cost</th>
                            <th scope="col">Days</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Account No</th>
                            <th scope="col">Status</th>
                            <?php echo is_admin() ? '<th scope="col">Action</th>' : '' ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($order_row = $order->fetch(PDO::FETCH_ASSOC) ) {
                            ?>
                            <tr>
                                <th scope="row">#<?php echo $order_row['order_no']; ?></th>
                                <td><?php get_suite_title( $order_row['suite_id'] ); ?></td>
                                <td><?php get_user_name( $order_row['user_id'] ); ?></td>
                                <td><?php get_room_title( $order_row['room_no'] ); ?></td>
                                <td><?php echo $order_row['guest']; ?></td>
                                <td>৳ <?php echo $order_row['total_cost']; ?></td>
                                <td><?php echo (int) round( (strtotime($order_row['check_out']) - strtotime($order_row['check_in'])) / (60 * 60 * 24)); ?></td>
                                <td><?php echo date("d M, Y", strtotime($order_row['check_in'])); ?></td>
                                <td><?php echo date("d M, Y", strtotime($order_row['check_out'])); ?></td>
                                <td><?php echo $order_row['payment_method']; ?></td>
                                <td><?php echo $order_row['account_no']; ?></td>
                                <td>
                                    <?php if ($order_row['status'] == 1) { ?>
                                        <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status">Completed</span>
                                        </span>
                                    <?php } else { ?>
                                        <span class="badge badge-dot mr-4">
                                            <i class="bg-warning"></i>
                                            <span class="status">Pending</span>
                                        </span>
                                    <?php } ?>
                                </td>

                                <?php if (is_admin()) { ?>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                                                <a class="dropdown-item" href="<?php echo get_page_permalink('status-update', $order_row['id'], 'order' ).'&status=1' ?>">Approve</a>
                                                <a class="dropdown-item" href="<?php echo get_page_permalink('status-update', $order_row['id'], 'order' ).'&status=0' ?>">Decline</a>
                                                <a class="dropdown-item" href="<?php echo get_page_permalink('delete', $order_row['id'], 'order' ) ?>">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                <?php } ?>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
