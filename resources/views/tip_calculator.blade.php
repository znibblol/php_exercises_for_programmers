<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tip Calculator</title>
</head>

<body>
    <div class="form">
        <label><input type="number" id="bill_amount" oninput="sendRequest(tip_percent)" value="100">&nbsp;Bill amount</label><br /><br />
        <label><input type="range" id="tip_percentage" step="1" min="5" max="25" value="5" oninput="sendRequest(this.value)">&nbsp;Tip percentage</label><br />
        <p>Tip amount is: <span id="tip_amount">5</span></p>
        <p>Total is: <span id="total_amount">105</span></p>
        <input type="hidden" id="_token" value="{{ csrf_token() }}" />
        <!-- <button type="button" onclick="sendRequest()">SEND</button> -->
    </div>

    <script>
        let tip_percent = document.getElementById('tip_percentage').value;
        const sendRequest = (tip_percentage) => {
            let bill_amount = document.getElementById('bill_amount').value;
            let csrf = document.getElementById('_token').value;

            let response = fetch('/tip_calculator', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        tip_percentage: tip_percentage ?? tip_percent,
                        bill_amount: bill_amount,
                        _token: csrf,
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    document.getElementById('tip_amount').innerText = data.tip;
                    document.getElementById('total_amount').innerText = data.total;
                })
        };
    </script>
</body>

</html>
