@extends(\App\Theme::template())
@section('content')

 <section class="breadcrumb-area breadcrumb-bg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="breadcrumb-content text-center">
                                <h2 class="title">Deal Form</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url("") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Deal-Form</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<!-- breadcrumb-area-e -->
	
	<div class="container mt-5 deal-form">
		<form>
			<div class="form-group col-sm-5 my-1 ">
				<label for="title"><h5>Firstname:</h5></label>
				<input type="text" class="form-control" id="firstname" placeholder="Firstname" />
			</div>
			 <div class="form-group col-sm-5 my-1 ">
			 <label for="title"><h5>Secondname:</h5></label>
			 <input type="text" class="form-control" id="secondname" placeholder="Secondname">
	         </div>
			<div class="for-group col-sm-7 my-1">
			    <label for="title"><h5>Address:</h5></label>
				<input type="text" class="form-control" id="address" placeholder="Address">
			</div>
			<div class="form-group col-sm-5 my-1">
				<label><h5>Phone#:</h5></label>
				<input type="text" class="form-control" id="phone" placeholder="03XX-XXXXXXX7"  />
			</div>
			<div class="form-group col-sm-5 my-1">
				<label><h5>NIC#:</h5></label>
				<input type="text" class="form-control" id="nic" placeholder="42201-XXXXXXX-2"  />
			</div>
			<div class="form-group col-sm-1 my-1" >
				<label><h5>No. of Travellers:</h5></label>
				<input type="number" class="form-control" id="no.ofTravellers"  />
			</div>
			<br />
			<button type="submit" class="btn btn-primary my-4">Submit</button>
		</form>
	</div>

	



@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
