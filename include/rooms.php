<?php
/**
* Template Name: Display All Orders List
* */
if (!is_admin()) {
    return;
}  

if ( is_admin() AND isset($_POST['room-submit']) ) {
    $room_name = $_POST['room-no'];
    $room_type = intval( $_POST['room-type'] );

    add_room( $room_name, $room_type );
}

$room = get_row( 'rooms', 'room_no' );

?>

<form action="#" method="POST">
    <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Add New Services</h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" name="room-submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-title">Room No</label>
                                <input type="text" id="input-title" class="form-control" name="room-no" placeholder="Enter Room No" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label  class="form-control-label" for="room-select">Room Type</label>
                                <select class="form-control" id="room-select" name="room-type" required>

                                  <?php
                                  $stmt = get_suite_list( 'suite' );
                                  while ($suite = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                    echo '<option value="'.$suite['id'].'">'.$suite['title'].'</option>';

                                }
                                ?>

                              </select>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="row">
    <div class="col-md-10 ml-auto mr-auto">
        <div class="card">
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Room No</th>
                            <th scope="col">Room Type</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rooms_row = $room->fetch(PDO::FETCH_ASSOC) ) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $rooms_row['room_no']; ?></th>
                                <td><?php get_suite_title($rooms_row['type']); ?></td>
                                <td>
                                    <?php if ($rooms_row['status'] == 1) { ?>
                                        <span class="badge badge-dot">
                                            <i class="bg-success"></i>
                                        </span>
                                    <?php } else { ?>
                                        <span class="badge badge-dot">
                                            <i class="bg-warning"></i>
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
                                                <a class="dropdown-item" href="<?php echo get_page_permalink('status-update', $rooms_row['id'], 'room' ).'&status=1' ?>">Approve</a>
                                                <a class="dropdown-item" href="<?php echo get_page_permalink('status-update', $rooms_row['id'], 'room' ).'&status=0' ?>">Decline</a>
                                                <a class="dropdown-item" href="<?php echo get_page_permalink('delete', $rooms_row['id'], 'room' ) ?>">Delete</a>
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