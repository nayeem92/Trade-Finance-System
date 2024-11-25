@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Applicant Guarantees</h1>

    <!-- Display the list of the applicant's existing guarantees -->
    @if ($guarantees->isEmpty())
        <p>You haven't created any guarantees yet.</p>
    @else
        <ul>
            @foreach ($guarantees as $guarantee)
                <li>{{ $guarantee->corporate_reference_number }} - Expiry: {{ $guarantee->expiry_date }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Display any messages, like success messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to show the form to create a new guarantee -->
    <a href="{{ route('guarantees.create') }}" class="btn btn-primary">Create New Guarantee</a>

    <!-- Create Guarantee Form (this will redirect to the create method in the GuaranteeController) -->
    @if (Route::currentRouteName() == 'guarantees.create')
        <h2>Create a New Guarantee</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('guarantees.store') }}">
            @csrf

            <div class="form-group">
                <label for="corporate_reference_number">Corporate Reference Number</label>
                <input type="text" name="corporate_reference_number" id="corporate_reference_number" class="form-control" value="{{ old('corporate_reference_number') }}" required>
            </div>

            <div class="form-group">
                <label for="expiry_date">Expiry Date</label>
                <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="{{ old('expiry_date') }}" required>
            </div>

            <!-- Add other guarantee fields as needed -->

            <button type="submit" class="btn btn-primary">Create Guarantee</button>
        </form>
    @endif
</div>
@endsection
