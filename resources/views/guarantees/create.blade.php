<form action="{{ route('applicant.guarantees.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="corporate_reference_number">Corporate Reference Number</label>
        <input type="text" class="form-control" id="corporate_reference_number" name="corporate_reference_number" required>
    </div>

    <div class="form-group">
        <label for="guarantee_type">Guarantee Type</label>
        <input type="text" class="form-control" id="guarantee_type" name="guarantee_type" required>
    </div>

    <div class="form-group">
        <label for="nominal_amount">Nominal Amount</label>
        <input type="number" class="form-control" id="nominal_amount" name="nominal_amount" required>
    </div>

    <div class="form-group">
        <label for="nominal_amount_currency">Nominal Amount Currency</label>
        <input type="text" class="form-control" id="nominal_amount_currency" name="nominal_amount_currency" required>
    </div>

    <div class="form-group">
        <label for="expiry_date">Expiry Date</label>
        <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
    </div>

    <div class="form-group">
        <label for="applicant_name">Applicant Name</label>
        <input type="text" class="form-control" id="applicant_name" name="applicant_name" required>
    </div>

    <div class="form-group">
        <label for="applicant_address">Applicant Address</label>
        <input type="text" class="form-control" id="applicant_address" name="applicant_address" required>
    </div>

    <div class="form-group">
        <label for="beneficiary_name">Beneficiary Name</label>
        <input type="text" class="form-control" id="beneficiary_name" name="beneficiary_name" required>
    </div>

    <div class="form-group">
        <label for="beneficiary_address">Beneficiary Address</label>
        <input type="text" class="form-control" id="beneficiary_address" name="beneficiary_address" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit Guarantee</button>
</form>
