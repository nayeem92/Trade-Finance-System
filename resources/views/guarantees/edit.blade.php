<!-- resources/views/guarantees/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guarantee</title>
</head>
<body>
    <h1>Edit Guarantee</h1>
    <form method="POST" action="{{ route('guarantees.update', $guarantee->id) }}">
        @csrf
        @method('PUT')
        
        <!-- Corporate Reference Number -->
        <label for="corporate_reference_number">Corporate Reference Number:</label>
        <input type="text" id="corporate_reference_number" name="corporate_reference_number" value="{{ old('corporate_reference_number', $guarantee->corporate_reference_number) }}">
        
        <!-- Guarantee Type -->
        <label for="guarantee_type">Guarantee Type:</label>
        <input type="text" id="guarantee_type" name="guarantee_type" value="{{ old('guarantee_type', $guarantee->guarantee_type) }}">
        
        <!-- Nominal Amount -->
        <label for="nominal_amount">Nominal Amount:</label>
        <input type="number" id="nominal_amount" name="nominal_amount" value="{{ old('nominal_amount', $guarantee->nominal_amount) }}">

        <!-- Nominal Amount Currency -->
        <label for="nominal_amount_currency">Nominal Amount Currency:</label>
        <input type="text" id="nominal_amount_currency" name="nominal_amount_currency" value="{{ old('nominal_amount_currency', $guarantee->nominal_amount_currency) }}">
        
        <!-- Expiry Date -->
        <label for="expiry_date">Expiry Date:</label>
        <input type="date" id="expiry_date" name="expiry_date" value="{{ old('expiry_date', $guarantee->expiry_date) }}">

        <!-- Applicant Name -->
        <label for="applicant_name">Applicant Name:</label>
        <input type="text" id="applicant_name" name="applicant_name" value="{{ old('applicant_name', $guarantee->applicant_name) }}">
        
        <!-- Applicant Address -->
        <label for="applicant_address">Applicant Address:</label>
        <input type="text" id="applicant_address" name="applicant_address" value="{{ old('applicant_address', $guarantee->applicant_address) }}">
        
        <!-- Beneficiary Name -->
        <label for="beneficiary_name">Beneficiary Name:</label>
        <input type="text" id="beneficiary_name" name="beneficiary_name" value="{{ old('beneficiary_name', $guarantee->beneficiary_name) }}">

        <!-- Beneficiary Address -->
        <label for="beneficiary_address">Beneficiary Address:</label>
        <input type="text" id="beneficiary_address" name="beneficiary_address" value="{{ old('beneficiary_address', $guarantee->beneficiary_address) }}">

        <button type="submit">Save</button>
    </form>
</body>
</html>
