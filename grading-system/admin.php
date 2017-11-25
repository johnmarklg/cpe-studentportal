<?php 
    require_once("functions/function.php");
    get_header();
?>
<body>
<!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Online Grades Viewing System in PHP and MySQL</h1>
            <h1>&nbsp;</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <a class="btn btn-danger" href="index.php">Go to Index</a>
            </div>
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Records:</h3>

            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="first_name">Lastname</label>
                    <input type="text" id="last_name" placeholder="Lastname" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="last_name">Firstname</label>
                    <input type="text" id="first_name" placeholder="Firstname" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Middlename</label>
                    <input type="text" id="mi" placeholder="Middlename" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">First Quarter</label>
                    <input type="text" id="first" placeholder="First Quarter Grade" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Second Quarter</label>
                    <input type="text" id="second" placeholder="Second Quarter Grade" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Third Quarter</label>
                    <input type="text" id="third" placeholder="Third Quarter Grade" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Fourth Quarter</label>
                    <input type="text" id="fourth" placeholder="Fourth Quarter Grade" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Final Grade</label>
                    <input type="text" id="finalGrade" placeholder="Final Grade" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_first_name">Lastname</label>
                    <input type="text" id="update_last_name" placeholder="Lastname" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_last_name">Firstname</label>
                    <input type="text" id="update_first_name" placeholder="Firstname" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_mi">Middlename</label>
                    <input type="text" id="update_mi" placeholder="Middlename" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">First Quarter</label>
                    <input type="text" id="update_first" placeholder="First Quarter Grade" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Second Quarter</label>
                    <input type="text" id="update_second" placeholder="Second Quarter Grade" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Third Quarter</label>
                    <input type="text" id="update_third" placeholder="Third Quarter Grade" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Fourth Quarter</label>
                    <input type="text" id="update_fourth" placeholder="Fourth Quarter Grade" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Final Grade</label>
                    <input type="text" id="update_finalGrade" placeholder="Final Grade" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
<?php
    get_footer();
?>