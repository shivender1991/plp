@extends('admin/layouts/app')
@section('main-content')
<div class="row">
	  <div class="col-12">
		<div class="card">
		  <div class="card-header">
		  <h4>SCED Data</h4>
		  <div class="card-header-action"> <a class="btn btn-outline-primary" href="{{ route('element.create') }}"> Elements SCED Upload</a>&nbsp <a class="btn btn-outline-primary" href="{{ route('attribute.create') }}"> Attributes SCED Upload</a>&nbsp;<a class="btn btn-outline-primary" href="{{ route('federal.upload') }}">SCED Upload Data</a>
		  <button type="button" class="btn btn-primary" onclick="activeDeactiveFederalColumn()"><i class="fas fa-cog"></i></button>
		  <!-- <button type="button" class="btn btn-primary" onclick="federalWithElementAttributeMapping()"><i class="fas fa-cog"></i></button> -->
		</div>
		</div>
		  <div class="card-body">
			<div class="table-responsive">
			  <table class="table table-striped" id="table-1">
				<thead>
				  <tr>
					<th class="text-center">
					  #
					</th>
				<?php 
					foreach($federal_headers as $federal_header) {  ?>
						<th data-toggle="tooltip" data-placement="top" data-original-title="<?php echo ucwords(str_replace('_',' ',$federal_header['name'])); ?>" ><?php  echo ucwords(str_replace('_',' ',$federal_header['name'])); ?></th>
					<?php  } ?>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				if(!$scedDatas->isEmpty()){
				$i=1;
				foreach($scedDatas as  $scedData){ ?>
				<tr>
					<td><?php  echo $i; ?></td>
					<?php foreach($federal_headers as $federal_header) {   ?>	
					<td data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $scedData[$federal_header['name']]; ?>" > <?php  echo Illuminate\Support\Str::limit($scedData[$federal_header['name']], 20); ?>
					</td>	
					<?php  } ?>
					<td><a class="btn btn-primary" href="{{ route('federal.mapping', ['id' =>$scedData['id']]) }}">Map </a>
					</td>   
					</tr>   
				<?php $i++; } } ?>	
				</tbody>
			  </table>
			</div>
		  </div>
		</div>
	  </div>
	</div>
			

@endsection