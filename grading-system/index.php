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
                <a class="btn btn-danger" href="admin.php">Go to Admin Side</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Records:</h3>

            <div class="display_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->


<!-- Bootstrap Modals -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">View Student Grades</h4>
            </div>
			
            <div class="modal-body">
                
				<div class="form-group">
                    <label for="email">Last Name</label>
                    <input id="update_last_name"  class="form-control" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <label for="email">First Name</label>
                    <input id="update_first_name" class="form-control"  readonly="readonly"/>
                </div>
				<div class="form-group">
                    <label for="email">Middle Name</label>
                    <input id="update_mi"  class="form-control" readonly="readonly"/>
                </div>
				<br><br>

                <div class="form-group">
                    <label for="email">First Quarter</label>
                    <input id="update_first" class="form-control" readonly="readonly"/>
                </div> 

                <div class="form-group">
                    <label for="email">Second Quarter</label>
                    <input id="update_second" class="form-control" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <label for="email">Third Quarter</label>
                    <input id="update_third" class="form-control" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <label for="email">Fourth Quarter</label>
                    <input id="update_fourth" class="form-control" readonly="readonly"/>
                </div>

                <div class="form-group">
                    <label for="email">Final Grade</label>
                    <input id="update_finalGrade" class="form-control" readonly="readonly"/>
                </div> 

            </div>
            <div class="modal-footer">
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
<?php
    get_footer();
?>