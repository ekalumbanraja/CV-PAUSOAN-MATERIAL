<table>
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
                <td>{{ number_format($income->total_income  ) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
