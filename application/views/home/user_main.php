<style type="text/css">
	.opsi{
		width: 8%;
		text-align: center;
	}
</style>

<section class="content">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="box box-info">
				<div class="box-header with-border">
					<i class="fa fa-users"></i>
					<h3 class="box-title" style="color: black">User Data</h3>
					<div class="pull-right box-tools">
						<button type="button" class="btn btn-default btn-sm pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<span class="pull-right">&nbsp;&nbsp;</span>
						<a href="#" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modalUser" data-whatever="" data-placement="top" title="Add User"><i class="fa fa-user-plus"></i> Add User</a>
					</div>
				</div>
				<div class="box-body" style="overflow-x:auto;">
					<table id="userList" class="table table-bordered table-hover" style="width:100%">
              			<thead>
			                <tr>
			                	<th>No</th>
			                	<th>Username</th>
			                  	<th>Name</th>
			                  	<th>Email</th>
			                  	<th>Status</th>
			                  	<th>Timestamp</th>
			                  	<th>Opsi</th>
			                </tr>
		                </thead>
              		</table>
              	</div>				
			</div>
		</div>
	</div>
</section>

<div class="row">
	<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header modal-info">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title" id="exampleModalLabel">Add User Data</h4>
      			</div>
      					
      			<form class="form-horizontal" id="userForm">
					<div class="modal-body">
						<div class="form-group">
							<label for="employee_id" class="control-label col-xs-4">Username</label> 
							<div class="col-xs-8">
								<div class="input-group">
									<input type="text" class="form-control" name="username" id="username" placeholder="Username"  required="required">
									<span class="input-group-addon"><i class="fa fa-id-badge"></i></span> 
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4">Password</label> 
							<div class="col-xs-8">
								<div class="input-group">
									<input type="text" class="form-control" name="password" id="password" placeholder="Password" required="required">
									<span class="input-group-addon"><i class="fa fa-id-card"></i></span> 
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="control-label col-xs-4">Name</label> 
							<div class="col-xs-8">
								<div class="input-group">
									<input type="text" class="form-control" name="name" id="name"  placeholder="Nama Karyawan" required="required" pattern="[a-zA-Z0-9]+" title="Nama karyawan harus diisi">									
									<span class="input-group-addon"><i class="fa fa-user"></i></span> 
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="control-label col-xs-4">Email</label> 
							<div class="col-xs-8">
								<div class="input-group">
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="control-label col-xs-4">Status</label> 
							<div class="col-xs-8">
								<div class="btn-group radio-group">
									<label class="btn btn-success not-active" id="enableLbl"><i class="fa fa-check-square-o"></i> Enable <input type="radio" name="status" id="statusEnable" value="1" required="required"></label>
                       				<label class="btn btn-danger not-active" id="disableLbl"><i class="fa fa-times-circle-o"></i> Disable <input type="radio" name="status" id="statusDisable" value="0" required="required"></label>
                       			</div>
							</div>
						</div>
					</div>

			        <div class="modal-footer">
			           	<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
			           	<button type="reset" class="btn btn-danger pull-right" name="reset" ><i class="fa fa-ban"></i> Reset</button>
			           	<span class="pull-right">&nbsp;&nbsp;</span>
			           	<button type="submit" class="btn btn-success pull-right" name="submit"><i class="fa fa-save"></i> Submit</button>
			        </div>
		    	</form>
	      	</div>
    	</div>
  	</div>
</div>
