<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600&display=swap" rel="stylesheet">

    <title>Math Genious 5k</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

            background-color: #1F2833;
            color: #FFF;
            font-family: 'Unbounded', cursive;
        }

        .wrapper {
            max-width: 70%;
            margin: 0 auto;
        }

        .wrapper h1 {
            font-size: 4rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .wrapper label {
            display: block;
            width: 100%;
            font-size: 1.4rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .wrapper input {
            display: block;
            width: 50%;
            margin: 0 auto;
            border: 0;
            outline: 0;
            box-shadow: 0;

            padding: 10px 5px;
            font-size: 1.2rem;
        }

        .wrapper h3 {
            text-align: center;
            font-size: 2.5rem;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>Math Genious 5k</h1>
        <label for="characters">Enter two numbers</label>
        <input type="hidden" id="csrf" value="{{ csrf_token() }}" />
        <input type="number" id="int_1" oninput="sendRequest()" value="10"> <br />
        <input type="number" id="int_2" oninput="sendRequest()" value="5">
        <h3 id="output">
            10 + 5 = 15 <br />
            10 - 5 = 5 <br />
            10 * 5 = 50 <br />
            10 / 5 = 2
        </h3>
    </div>

    <script>
        function sendRequest(string) {
            let token = document.getElementById('csrf').value;
            let int1 = document.getElementById('int_1').value;
            let int2 = document.getElementById('int_2').value;
            // make request
            fetch('/simplemath', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        int1: parseInt(int1),
                        int2: parseInt(int2),
                        _token: token
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById('output').innerText = data;
                })
        }
    </script>
</body>

</html>
