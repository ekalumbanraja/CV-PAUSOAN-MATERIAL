    
@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Monthly Income Report</title>
</head>
<body>
    <h1>Monthly Income Report</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Total Income</th>
            </tr>
        </thead>
        <tbody>
            @foreach($monthlyIncome as $income)
                <tr>
                    <td>{{ $income->year }}</td>
                    <td>{{ $income->month }}</td>
                    <td>{{ number_format($income->total_income, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/export-excel') }}">Export to Excel</a>
</body>
</html>
@endsection