<div id="myModal" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"></h4>

								</div>
								<div class="modal-body">
									<form class="form-horizontal" role="form">
										<div class="form-group">
											<label class="control-label col-sm-2" for="id">ID</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="id" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2" for="name">Name</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="name">
											</div>
										</div>
										<p class="lname_error error text-center alert alert-danger hidden"></p>
										<div class="form-group">
											<label class="control-label col-sm-2" for="email">Email</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" id="email">
											</div>
										</div>
									</form>
									<div class="deleteContent">
										Are you Sure you want to delete <span class="dname"></span> ? <span
											class="hidden did"></span>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn actionBtn" data-dismiss="modal">
											<span id="footer_action_button" class='glyphicon'> </span>
										</button>
										<button type="button" class="btn btn-warning" data-dismiss="modal">
											<span class='glyphicon glyphicon-remove'></span> Close
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					  //   	$datetime = Carbon::now();
		// Restaurant::where('id', $request->id)->insert(['name' => $request->name, 'hotkey' => $hotkey, 'subhotkey' => $subhotkey, 'address' => $address, 'phone' => $phone ]);

		// return response()->json(['name' => $request->name, 'hotkey' => $hotkey, 'subhotkey' => $subhotkey, 'address' => $address, 'phone' => $phone]);


		@extends('layout')

@section('title')

    {{ $title }}

@endsection

@section('content')

	<div class="table-responsive text-center">
		<table class="table table-hover table-bordered table-striped datatable" style="width:100%">

			<thead>
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Name</th>
					<th class="text-center">HotKey</th>
					<th class="text-center">SubHotKey</th>
					<th class="text-center">Address</th>
					<th class="text-center">Phone</th>
				</tr>
			</thead>

            @foreach($restaurants as $restaurant)

            <tr class="restaurant{{$restaurant->id}}">
                <td>{{$restaurant->id}}</td>
                <td class="name">{{$restaurant->name}}</td>
                <td class="hotkey">{{$restaurant->hotkey}}</td>
                <td class="subhotkey">{{$restaurant->subhotkey}}</td>
                <td class="address">{{$restaurant->address}}</td>
                <td class="phone">{{$restaurant->phone}}</td>
            </tr>

            @endforeach

        </table>
    </div>
@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/datatable/getdata') }}',
                columns: [ 
                	{
                        data: "Name:",
                        name: "name"
                    }, 
                    {
                        data: "Hotkey:",
                        name: "hotkey"
                    }, 
                    {
                        data: "SubHotkey:",
                        name: "subhotkey"
                    }, 
                    {
                        data: "Address:",
                        name: "address"
                    }, 
                    {
                        data: "Phone:",
                        name: "phone"
                    },
                ]
            });
        });
    </script>
@endsection


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DataTables;
use App\Restaurant;
use DB;

class DataTableController extends Controller
{    
    public function datatable()
    {
    	$title = 'Restaurant';
		$restaurants = \App\Restaurant::all();
        return view('datatable', compact('title', 'restaurants'));
    }

    public function register()
    {
    	return view('register');
    }
    public function create(Request $request)
    {
    	$name = $request->input('name');
    	$hotkey = $request->input('hotkey');
    	$subhotkey = $request->input('subhotkey');
    	$address = $request->input('address');
    	$phone = $request->input('phone');
		
		$rst = array('name' => $name, 'hotkey' => $hotkey, 'subhotkey' => $subhotkey, 'address' => $address, 'phone' => $phone);
		DB::table('restaurants')->insert($rst);    	
		return redirect()->to('/datatable/');
    }
    public function getPosts()
    {
        return \DataTables::of(Restaurant::query())->make(true);
        //return datatables()->of(Restaurant::query())->toJson();
    }
}

/////
@extends('layouts.dashboard')
@section('section')

@section('title')

	{{ $title }}

@endsection


	<!-- display restaurant list -->
	<div class="table-responsive text-center">
			<div class="row">
				<div class="col-sm-12">
					@section ('table_panel_title','Restaurants')
					@section ('table_panel_body')
					@include('widgets.table', array('class'=>''))
					@endsection
					@include('widgets.panel', array('header'=>true, 'as'=>'table'))
				</div>

	<!-- modal content -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>

				<div class="modal-body">

					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="control-label col-sm-2" for="id">ID</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fid" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name">
							</div>
						</div>
						  <div class="form-group">
							<label class="control-label col-sm-2" for="hotkey">Hotkey</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="hotkey">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="subhotkey">Subhotkey</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="subhotkey">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="address">Address</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="address">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="phone">Phone</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="phone">
							</div>
						</div>
					</form>

					<div class="deleteContent">
						Are you Sure you want to delete <span class="dname"></span> ? <span
						class="hidden did"></span>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button" class='glyphicon'> </span>
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
						</button>
					</div>

				</div>

			</div>
		</div>
	</div>

@endsection

@section('script')

	$('#table').DataTable({
		 dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'

        ],
        columnDefs: [ {
            targets: -1,
            visible: false
        }]
	});

	
	$(document).on('click', '.edit-modal', function() {
		$('#footer_action_button').text("Update");
		$('#footer_action_button').addClass('glyphicon-check');
		$('#footer_action_button').removeClass('glyphicon-trash');
		$('.actionBtn').addClass('btn-success');
		$('.actionBtn').removeClass('btn-danger');
		$('.actionBtn').removeClass('delete');
		$('.actionBtn').addClass('edit');
		$('.modal-title').text('Edit');
		$('.deleteContent').hide();
		$('.form-horizontal').show();
		var stuff = $(this).val().split(',');
		fillmodaluser(stuff)
		$('#myModal').modal('show');
	});

	$(document).on('click', '.delete-modal', function() {
		$('#footer_action_button').text(" Delete");
		$('#footer_action_button').removeClass('glyphicon-check');
		$('#footer_action_button').addClass('glyphicon-trash');
		$('.actionBtn').removeClass('btn-success');
		$('.actionBtn').addClass('btn-danger');
		$('.actionBtn').removeClass('edit');
		$('.actionBtn').addClass('delete');
		$('.modal-title').text('Delete');
		$('.deleteContent').show();
		$('.form-horizontal').hide();
		var stuff = $(this).val().split(',');
		console.log($(this).val('info'));
		$('.did').text(stuff[0]);
		$('.dname').html(stuff[1]);
		$('#myModal').modal('show');
	});

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

		}
	});

	$('.modal-footer').on('click', '.edit', function() {

		$.ajax({
			type: 'post',
			url: "{{ url('/datatable/update') }}",
			data: {
				'id'  : $('#fid').val(),
				'name': $('#name').val(),
				'hotkey': $('#hotkey').val(),
				'subhotkey': $('#subhotkey').val(),
				'address': $('#address').val(),
				'phone': $('#phone').val(),

			},
			success: function(response) {
				$('.restaurant' + response.id).find('.name').html(response.name);
				$('.restaurant' + response.id).find('.hotkey').text(response.hotkey);
				$('.restaurant' + response.id).find('.subhotkey').text(response.subhotkey);
				$('.restaurant' + response.id).find('.address').text(response.address);
				$('.restaurant' + response.id).find('.phone').text(response.phone); 
			}
		});
	});

	$('.modal-footer').on('click', '.delete', function() {
	
		$.ajax({
			type: 'post',
			url: "{{ url('/datatable/delete') }}",
			data: {
				'id': $('.did').text()
			},
			success: function(response) {
				$('#table').DataTable()
					.row( $('.restaurant' + response.id) )
					.remove()
					.draw();
			}
		});
	});

	function fillmodaluser(details){
		$('#fid').val(details[0]);
		$('#name').val(details[1]);
		$('#hotkey').val(details[2]);
		$('#subhotkey').val(details[3]);
		$('#address').val(details[4]);
		$('#phone').val(details[5]);
	}

@endsection