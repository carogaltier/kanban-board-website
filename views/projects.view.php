<!DOCTYPE html>
<html lang="en">
	
<head>
	<?php $title= "projects"; ?>
    <?php require 'head.php'; ?>

    <title><?php $title ?></title>
    <?php require 'events/modals/newProject.php'; ?> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="bg">

<header class="m-0 p-0">
	<nav class="navbar navbar-expand-lg pt-3 text-dark">
		<div class="menu container">
			<a href="index.php" class="navbar-brand">
			<!-- Logo Image -->
			<img src="img/logo.png" width="45" alt="Kalendar" class="d-inline-block align-middle mr-2">
			<!-- Logo Text -->
			<span class="logo_text align-middle">Kanban & Kalendar</span>
			</a>
            
			<button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
			<div id="navbarSupportedContent" class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
                    <li><a href="content.php" class="btn text-primary mr-2"><i class="fas fa-home pr-2"></i>Home</a></li>	
					<li><a href="logout.php" class="btn text-primary mr-2">Log out</a></li>				
				</ul>
			</div>
		</div>
	</nav>
</header>

<div class="row d-flex m-0 p-0 mt-4">

    <!-- --------------------------------- SHOWING LIST OF PROJECTS --------------------------------- -->
    <div class="col-3 p-0 pl-3 pr-1">
        <div class="card-hover-shadow-2x mb-3 card text-dark">
            <div class="card-header-tab card-header d-flex flex-nowrap justify-content-between">
                <h4 class="card-header-title font-weight-normal"><i class="fa fa-suitcase mr-3"></i><?php echo strtoupper($_SESSION['user']);?>'S PROJECTS</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#project-modal">+</button>
            </div>
            <div class="scroll-area">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                                
                                <?php if (isset($projects)) {	
                                    $i = 1;
                                    foreach ($projects as $p): 
                                    ?>                         
                                    <li class="accordion list-group-item pe-auto" id="project-p-<?php echo $i; ?>">        
                                    <div class="todo-indicator" style="background-color:<?php echo $p['project_colour'];?>;">
                                        </div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">                                            
                                                <form name="id_project_task" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET" role="form">
                                                    <input hidden name="idProject" value=<?php echo $p['id_project']; ?> >                                                    
                                                    <button class="btn" type="submit">
                                                        <div class="widget-content-left">
                                                            <div class="text-left widget-heading text-primary">
                                                                <?php echo $p['project_name'];?>                                                                
                                                            </div>                                                            
                                                            <div class="widget-subheading text-muted"><i>Start: <?php echo $p['start_date'];?></i></div>
                                                            <div class="widget-subheading text-muted"><i>End: <?php echo $p['end_date'];?></i></div>                                                       
                                                           
                                                        </div>
                                                    </button>
                                                </form>                                               
                                             
                                                <div class="widget-content-right ml-auto d-flex flex-nowrap"> 
                                                    <button type="button" class="border-0 btn-transition btn btn-outline-success" data-toggle="modal" data-target="#project-edit-<?php echo $i; ?>"> <i class="fas fa-pencil-alt"></i></button> 
                                                    <?php require 'events/modals/editProject.php'; ?>
                                                    <button type="button" class="border-0 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#project-delete-<?php echo $i; ?>"> <i class="fas fa-trash-alt"></i> </button> 
                                                    <?php require 'events/modals/delProject.php'; ?>
                                                </div>                                                
                                            </div>
                                            <?php if($p['project_description'] !== ''){ ?>
                                            <a class="d-flex justify-content-center nav-link text-primary p-0" data-toggle="collapse" data-target="#collapse-p-<?php echo $i; ?>" aria-expanded="true">
                                                <span class="accicon"><i class="fa fa-angle-down rotate-icon pl-2 pr-2"></i></span>
                                                <div  id="collapse-p-<?php echo $i; ?>" class="collapse" data-parent="#project-p-<?php echo $i; ?>">                                                    
                                                    <p class="font-small text-dark pt-1"><?php echo $p['project_description'];?></p> 
                                                </div>
                                            </a>
                                            <?php  }; ?>
                                        </div>                                    
                                    </li>

                                    
                                
                                <?php $i++;
                                endforeach; }  ?>

                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
        </div>
    </div>

    <!-- --------------------------------- SHOWING LIST OF TASKS --------------------------------- -->
    <div class="col-9 p-0 pr-3 pl-1">
        <div class="card-hover-shadow-2x mb-3 card text-dark">
            <div class="card-header-tab card-header d-flex justify-content-between">
                <h4 class="card-header-title font-weight-normal"><i class="fas fa-clipboard-list pr-3"></i>TASKS</h4>
                <?php if (isset($show_tasks)) { 
                    echo"<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#new-task-modal'>New task</button>";
                    require 'events/modals/newTask.php';} ?>
            </div>
            <div class="scroll-area">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <div class="row m-2 mt-4">
                                <div class="col-4">
                                    <div class="card-hover-shadow-2x mb-3 card text-dark">
                                        <div class="card-header-tab card-header">
                                            <h5 class="card-header-title font-weight-normal"><i class="fas fa-list mr-3"></i>TO DO</h5>                                            
                                        </div>
                                        <div class="scroll-area-sm">
                                            <perfect-scrollbar class="ps-show-limits">
                                                <div style="position: static;" class="ps ps--active-y">
                                                    <div class="ps-content">
                                                        <ul class=" list-group list-group-flush">                                                          

                                                        <?php if (isset($show_tasks)) {	
                                                            $i = 1;
                                                            foreach ($show_tasks as $s): 
                                                                if($s['task_status'] == '1'){
                                                        ?>  
                                                            <li class="accordion list-group-item pe-auto" id="task-todo-<?php echo $i; ?>">                                                                      
                                                                <div class="todo-indicator" style="background-color:<?php echo $s['task_colour'];?>;">
                                                                </div>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <a class="col-8 nav-link text-primary p-0" data-toggle="collapse" data-target="#collapse-todo-<?php echo $i; ?>" aria-expanded="true">
                                                                            <div class="widget-content-left p-2 pl-3">
                                                                                <div class="widget-heading d-flex">                                                                                   
                                                                                <?php echo $s['task_name'];?>                                                                                                                                                             
                                                                                    <span class="accicon"><i class="fa fa-angle-down rotate-icon pl-2"></i></span>
                                                                                </div>                                                                                  
                                                                                <div  id="collapse-todo-<?php echo $i; ?>" class="collapse" data-parent="#task-todo-<?php echo $i; ?>">  
                                                                                    <div class="widget-subheading text-muted"><i> <?php if( $s['deadline'] !== '1970-01-01'){
                                                                                                                                                echo "Deadline:";
                                                                                                                                                echo $s['deadline'];} ?></i></div>  
                                                                                    <p class="font-small text-dark pt-1"><?php echo $s['task_description'];?></p>                                                                                                                                                                                                                   
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <div class="widget-content-right ml-auto"> 
                                                                            <button type="button" class="border-0 btn-transition btn btn-outline-success" data-toggle="modal" data-target="#task-edit-<?php echo $i; ?>"> <i class="fas fa-pencil-alt"></i></button> 
                                                                        <?php  require 'events/modals/editTask.php' ?>    
                                                                            <button type="button" class="border-0 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#task-delete-<?php echo $i; ?>"> <i class="fas fa-trash-alt"></i> </button> 
                                                                        <?php  require 'events/modals/delTask.php' ?>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <div class="d-flex justify-content-center">                                                                    
                                                                    <button type="submit" class="border-0 btn-transition btn btn-outline-secondary" disabled> <i class="fa fa-arrow-left"></i></button>
                                                                    <form name="id_task_right-<?php echo $i; ?>" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
                                                                        <input hidden name="id_task_right" value=<?php echo $s['id_task']; ?> >
                                                                        <input hidden name="task_status" value=<?php echo $s['task_status']; ?> >           
                                                                        <input hidden name="id_project_right" value=<?php echo $s['id_project']; ?> >                                          
                                                                        <button type="submit" class="border-0 btn-transition btn btn-outline-primary"> <i class="fa fa-arrow-right"></i></button>
                                                                    </form>     
                                                                </div>                                    
                                                            </li>

                                                            <?php $i++; }
                                                            endforeach; }  ?>                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </perfect-scrollbar>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card-hover-shadow-2x mb-3 card text-dark">
                                        <div class="card-header-tab card-header d-flex justify-content-between">
                                            <h5 class="card-header-title font-weight-normal"><i class="fas fa-cogs mr-3"></i>IN PROGRESS</h5>                                            
                                        </div>
                                        <div class="scroll-area-sm">
                                            <perfect-scrollbar class="ps-show-limits">
                                                <div style="position: static;" class="ps ps--active-y">
                                                    <div class="ps-content">
                                                        <ul class=" list-group list-group-flush">
                                                        
                                                        <?php if (isset($show_tasks)) {	
                                                            $i = 1000000;
                                                            foreach ($show_tasks as $s): 
                                                                if($s['task_status'] == '2'){
                                                        ?>  
                                                        
                                                        <li class="accordion list-group-item pe-auto" id="task-ip-<?php echo $i; ?>">        
                                                                <div class="todo-indicator" style="background-color:<?php echo $s['task_colour'];?>;">
                                                                </div>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <a class="col-8 nav-link text-primary p-0" data-toggle="collapse" data-target="#collapse-ip-<?php echo $i; ?>" aria-expanded="true">
                                                                            <div class="widget-content-left p-2 pl-3">
                                                                                <div class="widget-heading d-flex">                                                                                   
                                                                                <?php echo $s['task_name'];?>                                                                                                                                                             
                                                                                    <span class="accicon"><i class="fa fa-angle-down rotate-icon pl-2"></i></span>
                                                                                </div>                                                                                  
                                                                                <div  id="collapse-ip-<?php echo $i; ?>" class="collapse" data-parent="#task-ip-<?php echo $i; ?>">  
                                                                                    <div class="widget-subheading text-muted"><i><?php if( $s['deadline'] !== '1970-01-01'){
                                                                                                                                                echo "Deadline:";
                                                                                                                                                echo $s['deadline'];} ?></i></div>  
                                                                                    <p class="font-small text-dark pt-1"><?php echo $s['task_description'];?></p>                                                                                                                                                                                                                   
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <div class="widget-content-right ml-auto"> 
                                                                            <button type="button" class="border-0 btn-transition btn btn-outline-success" data-toggle="modal" data-target="#task-edit-<?php echo $i; ?>"> <i class="fas fa-pencil-alt"></i></button> 
                                                                        <?php  require 'events/modals/editTask.php' ?>    
                                                                            <button type="button" class="border-0 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#task-delete-<?php echo $i; ?>"> <i class="fas fa-trash-alt"></i> </button> 
                                                                        <?php  require 'events/modals/delTask.php' ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-center">   
                                                                    <form name="id_task_left-<?php echo $i; ?>" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
                                                                        <input hidden name="id_task_left" value=<?php echo $s['id_task']; ?> >
                                                                        <input hidden name="task_status" value=<?php echo $s['task_status']; ?> >           
                                                                        <input hidden name="id_project_left" value=<?php echo $s['id_project']; ?> >                                          
                                                                        <button type="submit" class="border-0 btn-transition btn btn-outline-primary"> <i class="fa fa-arrow-left"></i></button>
                                                                    </form>
                                                                    <form name="id_task_right-<?php echo $i; ?>" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
                                                                        <input hidden name="id_task_right" value=<?php echo $s['id_task']; ?> >
                                                                        <input hidden name="task_status" value=<?php echo $s['task_status']; ?> >           
                                                                        <input hidden name="id_project_right" value=<?php echo $s['id_project']; ?> >                                          
                                                                        <button type="submit" class="border-0 btn-transition btn btn-outline-primary"> <i class="fa fa-arrow-right"></i></button>
                                                                    </form>       
                                                                </div>                                     
                                                            </li>

                                                            <?php $i++; }
                                                            endforeach; }  ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </perfect-scrollbar>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-4">
                                    <div class="card-hover-shadow-2x mb-3 card text-dark">
                                        <div class="card-header-tab card-header d-flex justify-content-between">
                                            <h5 class="card-header-title font-weight-normal"><i class="fas fa-check mr-3"></i>COMPLETE</h5>                                            
                                        </div>
                                        <div class="scroll-area-sm">
                                            <perfect-scrollbar class="ps-show-limits">
                                                <div style="position: static;" class="ps ps--active-y">
                                                    <div class="ps-content">
                                                        <ul class=" list-group list-group-flush"> 
                                                        <?php if (isset($show_tasks)) {	
                                                            $i = 2000000;
                                                            foreach ($show_tasks as $s): 
                                                                if($s['task_status'] == '3'){
                                                        ?>  
                                                        
                                                            <li class="accordion list-group-item pe-auto" id="task-c-<?php echo $i; ?>">        
                                                                <div class="todo-indicator" style="background-color:<?php echo $s['task_colour'];?>;">
                                                                </div>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <a class="col-8 nav-link text-primary p-0" data-toggle="collapse" data-target="#collapse-c-<?php echo $i; ?>" aria-expanded="true">
                                                                            <div class="widget-content-left p-2 pl-3">
                                                                                <div class="widget-heading d-flex">                                                                                   
                                                                                <?php echo $s['task_name'];?>                                                                                                                                                             
                                                                                    <span class="accicon"><i class="fa fa-angle-down rotate-icon pl-2"></i></span>
                                                                                </div>                                                                                  
                                                                                <div  id="collapse-c-<?php echo $i; ?>" class="collapse" data-parent="#task-c-<?php echo $i; ?>">  
                                                                                    <div class="widget-subheading text-muted"><i><?php if( $s['deadline'] !== '1970-01-01'){
                                                                                                                                                echo "Deadline:";
                                                                                                                                                echo $s['deadline'];} ?></i></div>  
                                                                                    <p class="font-small text-dark pt-1"><?php echo $s['task_description'];?></p>                                                                                                                                                                                                                   
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <div class="widget-content-right ml-auto"> 
                                                                            <button type="button" class="border-0 btn-transition btn btn-outline-success" data-toggle="modal" data-target="#task-edit-<?php echo $i; ?>"> <i class="fas fa-pencil-alt"></i></button> 
                                                                        <?php  require 'events/modals/editTask.php' ?>    
                                                                            <button type="button" class="border-0 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#task-delete-<?php echo $i; ?>"> <i class="fas fa-trash-alt"></i> </button> 
                                                                        <?php  require 'events/modals/delTask.php' ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-center">   
                                                                    <form name="id_task_left-<?php echo $i; ?>" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
                                                                        <input hidden name="id_task_left" value=<?php echo $s['id_task']; ?> >
                                                                        <input hidden name="task_status" value=<?php echo $s['task_status']; ?> >           
                                                                        <input hidden name="id_project_left" value=<?php echo $s['id_project']; ?> >                                          
                                                                        <button type="submit" class="border-0 btn-transition btn btn-outline-primary"> <i class="fa fa-arrow-left"></i></button>
                                                                    </form>
                                                                    <button type="submit" class="border-0 btn-transition btn btn-outline-secondary" disabled> <i class="fa fa-arrow-right"></i></button>       
                                                                </div>                                                                                                    
                                                            </li>

                                                            <?php $i++; }
                                                            endforeach; }  ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </perfect-scrollbar>
                                        </div>
                                    </div>
                                </div>                                 
                            </div>                            
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------- FOOTER --------------------------- -->
<?php require 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.min.js"></script>

    
<script>
    $(document).ready(function () {
        $("#startAdd").datepicker({
            todayBtn: 1,
            autoclose: true,
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#endAdd').datepicker('setStartDate', minDate);
        });
        $("#endAdd").datepicker()
            .on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#startAdd').datepicker('setEndDate', minDate);
            });

        $("#startAdd1").datepicker({
            todayBtn: 1,
            autoclose: true,
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#endAdd1').datepicker('setStartDate', minDate);
        });
        $("#endAdd1").datepicker()
            .on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#startAdd1').datepicker('setEndDate', minDate);
            });

        $("#startAdd2").datepicker({
            todayBtn: 1,
            autoclose: true,
            minDate: 0,
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#endAdd2').datepicker('setStartDate', minDate);
        });
        $("#endAdd2").datepicker()
            .on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#startAdd2').datepicker('setEndDate', minDate);
            });       
    });    
</script>

</body>
</html>
