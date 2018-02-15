<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
	$(document).ready(function() {
		$('#exampleModal').on('show.bs.modal', function (event) 
		{
			var button = $(event.relatedTarget);
	  		var recipient = button.data('whatever'); 
	  		var modal = $(this);
	  		modal.find('.modal-title').text('New message to ' + recipient);
	  		modal.find('.modal-body input').val(recipient);
		});
	});
</script>