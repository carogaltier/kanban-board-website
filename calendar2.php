<?php 
if (isset($_SESSION['user'])) {
} else {
	header('Location: main.php');
	die();
}?>

<script>
	function modalShow() {
		$('#modalShow').modal('show');
	}

	$(document).ready(function() {
		$('#calendar').fullCalendar({


		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay,listYear'
		},

		defaultDate:'<?php echo date('Y-m-d'); ?>',
		editable: true,
		navLinks: true,
		eventLimit: true,
		selectable: true,
		selectHelper: true,
		select: function(start, end) {
			$('#ModalAdd #start_date').val(moment(start).format('DD-MM-YYYY HH:mm:ss'));
			$('#ModalAdd #end_date').val(moment(end).format('DD-MM-YYYY HH:mm:ss'));
			$('#ModalAdd').modal('show');
		},
		eventRender: function(event, element) {
			element.bind('click', function() {
				$('#ModalEdit #id_event').val(event.id);
				$('#ModalEdit #title').val(event.title);
				$('#ModalEdit #description').val(event.description);
				$('#ModalEdit #colour').val(event.color);
				$('#ModalEdit #start_date').val(event.start.format('DD-MM-YYYY HH:mm:ss'));
				$('#ModalEdit #end_date').val(event.end.format('DD-MM-YYYY HH:mm:ss'));
				$('#ModalEdit').modal('show');
			});
		},
		eventDrop: function(event, delta, revertFunc) { 
			edit(event);
		},
					
		eventResize: function(event,dayDelta,minuteDelta,revertFunc) { 
			edit(event);
		},

		events: [
					<?php foreach($events as $event): 
						$start = explode(" ", $event['start_date']);
						$end = explode(" ", $event['end_date']);
						if($start[1] == '00:00:00'){
							$start = $start[0];
						}else{
							$start = $event['start_date'];
						}
						if($end[1] == '00:00:00'){
							$end = $end[0];
						}else{
							$end = $event['end_date'];
						}
					?>
					{
						id: '<?php echo $event['id_event']; ?>',
						title: '<?php echo $event['title']; ?>',
						description: '<?php echo $event['description']; ?>',
						start: '<?php echo $start; ?>',
						end: '<?php echo $end; ?>',
						color: '<?php echo $event['colour']; ?>',
					},
					<?php endforeach; ?>
				]
			});
				
				function edit(event){
					start = event.start.format('DD-MM-YYYY HH:mm:ss');
					if(event.end){
						end = event.end.format('DD-MM-YYYY HH:mm:ss');
					}else{
						end = start;
					}
					
					id_event =  event.id;
					
					Event = [];
					Event[0] = id_event;
					Event[1] = start;
					Event[2] = end;
					
					$.ajax({
					url: 'events/actions/eventEditData.php',
					type: "POST",
					data: {Event:Event},
					success: function(rep) {
							if(rep == 'OK'){
								alert('Data successfully updated');
							}else{
								alert('There was a problem while saving, please try again!'); 
							}
						}
				});
			}
		});

</script>