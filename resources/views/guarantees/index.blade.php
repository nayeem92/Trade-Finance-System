<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guarantees</title>
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Guarantees List</h1>

    <!-- Back to Dashboard Button -->
    <a href="{{ route('dashboard.applicant') }}" class="btn">Back to Dashboard</a>
    
    

    @if ($guarantees->isEmpty())
        <p>No guarantees found.</p>
    @else
        <ul>
            @foreach ($guarantees as $guarantee)
                <li>
                    Corporate Reference: {{ $guarantee->corporate_reference_number }}<br>
                    Guarantee Type: {{ $guarantee->guarantee_type }}<br>
                    Nominal Amount: {{ $guarantee->nominal_amount }} {{ $guarantee->nominal_amount_currency }}<br>
                    Expiry Date: {{ $guarantee->expiry_date }}<br>
                </li>
                <hr>
            @endforeach
        </ul>
    @endif
</body>
</html>
