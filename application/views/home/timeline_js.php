<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>bower_components/jquery-ui/jquery-ui.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#modalFile').on('show.bs.modal', function (event) 
		{
			var button = $(event.relatedTarget);
	  		var modalData = button.data('whatever');
	  		var modal = $(this);
	  		if (modalData != ''){ 
	        		modal.find('.modal-title').text('Edit User Data - ' + modalData);
	  		}
		});
	});
</script>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">