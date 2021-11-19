
<?php
if (isset($_SESSION['user'])) {
} else {
	header('Location: login.php');
	die();
}
?>
<!-- --------------------------------------- EDIT PROJECT MODAL ------------------------------------------------------ -->
<div id="project-edit-<?php echo $i; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="lead text-primary" >Edit your project</h3>
                <a class="close text-dark btn" data-dismiss="modal">×</a>
            </div>
            <form name="project" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
                <div class="modal-body">				
                    <div class="form-group">
                        <label class="text-dark" for="edit_name">Project Name<span class="text-danger pl-1">*</span></label>
                        <input class="form-control" type="text" name="edit_project_name" value="<?php echo $p['project_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="edit_description">Description</label>
                        <textarea class="form-control" type="text" name="edit_project_description"><?php echo $p['project_description']; ?></textarea>
                    </div>
					<div class="form-group">
						<label for="edit_colour" class="text-dark">Colour</label>
						<select name="edit_project_colour" class="form-control" style="color:<?php echo $p['project_colour']; ?>" value="<?php echo $p['project_colour'];?>">
							<option style="color:<?php echo $p['project_colour']; ?>" value="<?php echo $p['project_colour'];?>">&#9724; 
                        <?php 
                         if($p['project_colour'] == '#0275d8') {echo "Blue";} 
                         elseif ($p['project_colour'] == '#5bc0de') {echo "Tile";} 
                         elseif ($p['project_colour'] == '#5cb85c') {echo "Green";} 
                         elseif ($p['project_colour'] == '#f0ad4e') {echo "Orange";} 
                         elseif ($p['project_colour'] == '#d9534f') {echo "Red";} 
                         elseif ($p['project_colour'] == '#292b2c') {echo "Black";} 
                         else { echo ""; } ?>                      
                        
                        </option>
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
                        <input type="text" class="form-control" runat="server" id="startAdd1" name="edit_start_date" value="<?php echo $p['start_date']; ?>" required data-date-format="yyyy-mm-dd"/>
                    </div>
                    <div class="col-6 m-0 p-1">  
                        <label class="text-dark">End date<span class="text-danger pl-1">*</span></label>
                        <input type="text" class="form-control" runat="server" id="endAdd1" name="edit_end_date" value="<?php echo $p['end_date']; ?>"required data-date-format="yyyy-mm-dd"/>
                    </div>
                </div>

                    <div class="form-group">
                        <input hidden id="edit_id_project" name="edit_id_project" value="<?php echo $p['id_project']; ?>" >
                    </div>					
                </div>
                <div class="modal-footer">					
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
