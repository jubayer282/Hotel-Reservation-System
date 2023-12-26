<?php
/**
* Template Name: Display All Orders List
* */

if ( is_admin() AND isset($_POST['facilitie-submit']) ) {
    $title = $_POST['facilitie-title'];

    add_facilitie( $title );
}

$facilities = get_row( 'facilities', 'title' );

if (is_admin()) {
?>

<form action="#" method="POST">
    <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Add Facilities</h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" name="facilitie-submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-title">Title</label>
                                <input type="text" id="input-title" class="form-control" name="facilitie-title" placeholder="Facilities Title" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php } ?>

<div class="row">
    <div class="col-md-10 ml-auto mr-auto">
        <div class="card">
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Title</th>
                            <?php echo is_admin() ? '<th scope="col" class="text-right">Action</th>' : '' ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($facilitie = $facilities->fetch(PDO::FETCH_ASSOC) ) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $facilitie['title']; ?></th>

                                <?php if (is_admin()) { ?>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="<?php echo get_page_permalink('delete', $facilitie['id'], 'facilitie' ) ?>">Delete</a>
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