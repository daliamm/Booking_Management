@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Team </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
							<!-- <div class="breadcrumb-title pe-3">All Team </div> -->
							<a href="{{route('add.team')}}" class="btn btn-outline-primary px-5 radius-30">Add Team</a>

							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Team</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									
									<tr>
										<th>SI</th>
										<th>Image</th>
										<th>Nmae</th>
										<th>Postion</th>
										<th>Facebook</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								@foreach($team as $key=>$item)
									<tr>
										<td>{{$key+1}}</td>
										<td><img src="{{(!empty($item->image)) ? url('upload//roomimg/'.$item->image):url('upload/no_image.jpg')}}" alt="" style="width:50px; height:30px;"></td>
										<td>{{$item->name}}</td>
										<td>{{$item->postion}}</td>
										<td>{{$item->facebook}}</td>
										<td>
                                 <a href="{{route('edit.team',$item->id)}}" class="btn btn-warning px-3 radiue-30">Edit</a>
                                 <a href="{{route('delete.team',$item->id)}}" class="btn btn-danger px-3 radiue-30" id="delete">Delete</a>
                               




										</td>
									</tr>
								@endforeach
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
				
				
			</div>
@endsection