@extends(\App\Theme::template())
@section('content')
	<style>
		/* Custom styling for upload button */
		.upload-btn {
			display: inline-block;
			padding: 6px 12px;
			cursor: pointer;
			background-color: #eee;
			color: #333;
			border-radius: 4px;
		}
		.upload-btn:hover {
			background-color: #ccc;
		}
        .file-choose {
            position: relative;
            left: 10vw;
        }
        .file-choose span {
            height: 100px;
            justify-content: center;
            width: 100px;
            background-color: #ccc;
        }
		/* Custom styling for label */
		.deal-form label {
			color: #5867dd;
		}
        .deal-form h5 {
            color: #00000069;
        }
	</style>

	<div class="container mt-5 deal-form">
		<form>
			<div class="form-group col-sm-7 my-1">
				<label for="title"><h5>Title:</h5></label>
				<input type="text" class="form-control" id="title" placeholder="Deal Title">
			</div>
			<div class="form-group my-1">
				<label for="picture"><h5>Upload A Picture:</h5></label>
				<div class="input-group">
					<div class="custom-file">
						<!-- <input type="file" class="custom-file-input" id="picture"> -->
						<label class="custom-file-label upload-btn" for="picture">Choose file</label>
					</div>
					<div class="input-group-append file-choose">
						<span class="input-group-text" style="background-color: #ccc;"><i class="fas fa-plus"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group my-1">
				<label for="date"><h5>Date:<h5></label>
				<div class="form-row d-flex">
					<div class=" px-2">
                        <label>From:</label>
						<input type="date" class="form-control" id="from-date" placeholder="From">
					</div>
					<div class=" px-2">
						<label>To:</label>
                        <input type="date" class="form-control" id="to-date" placeholder="To">
					</div>
				</div>
			</div>
			<div class="form-group col-md-5 my-1">
				<label for="flight-type"><h5>Flight Type:</h5></label>
				<select class="form-control" id="flight-type">
					<option>Economy</option>
					<option>Standard</option>
					<option>Business</option>
				</select>
			</div>
			<div class="form-group col-md-2 my-1" >
				<label for="amount"><h5>Amount:</h5></label>
				<input type="number" class="form-control" id="amount" /> 
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

	<!-- Include FontAwesome for the plus icon -->
	<script src="https://kit.fontawesome.com/6d0e6a3b32.js" crossorigin="anonymous"></script>

	<!-- Include Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>





@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
