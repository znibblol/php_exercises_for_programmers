<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600&display=swap" rel="stylesheet">

    <title>Character counter 2k23</title>

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
        <h1>Character counter 2k23</h1>
        <label for="characters">Type something awesome.</label>
        <input type="text" id="characters" oninput="sendRequest(this.value)" value="bla bla bla">
        <input type="hidden" id="csrf" value="{{ csrf_token() }}" />
        <h3 id="output">Your input contains 11 characters</h3>
    </div>

    <script>
        function sendRequest(string) {
            let token = document.getElementById('csrf').value;
            // make request
            fetch('/numofchars', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({characters: string, _token: token})
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('output').innerText = `Your input contains ${data} characters`;
            })
        }
    </script>
</body>

</html>
