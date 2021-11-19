
<?php
if (isset($_SESSION['user'])) {
} else {
	header('Location: main.php');
	die();
}
?>

<!-- --------------------------------------- NEW PROJECT MODAL ------------------------------------------------------ -->
<div id="project-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="lead text-primary" >Create a New project</h3>
                <a class="close text-dark btn" data-dismiss="modal">×</a>
            </div>
            <form name="project" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
                <div class="modal-body">				
                    <div class="form-group">
                        <label class="text-dark" for="project_name">Project Name<span class="text-danger pl-1">*</span></label>
                        <input class="form-control" type="text" name="project_name" required>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="project_description">Description</label>
                        <textarea class="form-control" type="text" name="project_description"></textarea>
                    </div>
					<div class="form-group">
						<label for="project_colour" class="text-dark">Colour</label>
						<select name="project_colour" class="form-control">
							<option value="">Pick a colour</option>
							<option style="color:#0275d8" value="#0275d8">&#9724; Blue</option>
							<option style="color:#5bc0de" value="#5bc0de">&#9724; Tile</option>
							<option style="color:#5cb85c" value="#5cb85c">&#9724; Green</option>						  
							<option style="color:#f0ad4e" value="#f0ad4e">&#9724; Orange</option>
							<option style="color:#d9534f" value="#d9534f">&#9724; Red</option>
							<option style="color:#292b2c" value="#292b2c">&#9724; Black</option>						  
						</select>
				    </div>          

                <div class="form-group d-flex justify-content-between mt-2">
                    <div class="col-6 mt-0 p-1">                        
                        <label class="text-dark">Start Date<span class="text-danger pl-1">*</span></label>
                        <input type="text" class="form-control" runat="server" id="startAdd" name="start_date" required data-date-format="yyyy-mm-dd"/>
                    </div>
                    <div class="col-6 m-0 p-1">  
                        <label class="text-dark">End date<span class="text-danger pl-1">*</span></label>
                        <input type="text" class="form-control" runat="server" id="endAdd" name="end_date" required data-date-format="yyyy-mm-dd"/>
                    </div>
                </div>

                    <div class="form-group">
                        <input hidden id="id_user" name="id_user" value=<?php echo $_SESSION['id_user']; ?> >
                    </div>					
                </div>
                <div class="modal-footer">					
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
