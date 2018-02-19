<style type="text/css">
	.embed-responsive {
    position: relative;
    display: block;
    height: 0;
    padding: 0;
}
</style>

<script>
	var options = {
    	pdfOpenParams: { pagemode: 'none', scrollbar: '1', toolbar: '0', statusbar: '1', messages: '0', navpanes: '1', view: 'FitH' },
		fallbackLink: '<div class="row"><div class="col-md-3"></div><div class="col-md-6"><div class="alert alert-warning alert-dismissible"><i class="icon fa fa-warning"></i>This browser does not support inline PDFs. Please use Google Chrome</div></div></div>'};

	window.onload = function (){
		var pdf = document.querySelector("#pdf");
		pdf.innerHtml = PDFObject.embed("<?=base_url().$data?>", "#pdf", options);
	}
</script>

<section class="content">
	<div class="row">		
		 <!-- src="<?=base_url().$data?>#pagemode=thumbs&navpanes=1&toolbar=0&statusbar=1&view=FitH" -->
			<div class="embed-responsive" style="padding-bottom:41%">
				<div id="pdf"></div>
			</div>

		
			
	</div>
</section>
