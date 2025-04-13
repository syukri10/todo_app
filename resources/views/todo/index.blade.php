<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo_App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 2em auto;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }
        h1 {
            text-align: center;
            color: #555;
        }
        form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1em;
            background: #fff;
            padding: 1em;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            flex: 1;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 1em 0;
            text-align: right;
        }
        li {
            background: #fff;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between; 
            align-items: center;
            flex-direction: row;
        }
        li div {
            flex-grow: 1; 
            text-align: left; 
        }
        li strong {
            font-size: 1.1em;
            color: #333;
        }
        li small {
            color: #888;
            font-size: 0.9em;
        }
        li p {
            margin: 0.5em 0;
            color: #555;
        }
        li form {
            margin-left: auto;
        }
    </style>
    
</head>
<body>
    <h1>My TODO List</h1>

    <form action="{{ route('todo.store') }}" method="POST">
        @csrf
        <input type="text" name="task" placeholder="Task Title?" required>
        <input type="text" name="description" placeholder="Task Description?" required>
        <button type="submit">Add</button>
    </form>

    {{-- display all the task --}}
    <ul>
        @forelse ($todos as $index => $todo)
            <li>
                <div>
                    <strong>Task: {{ $todo['task'] }}</strong> 
                    <p>Description: {{ $todo['description'] }}</p>
                    <small>Created at: {{ $todo['created_at'] }}</small>
                </div>
                <form action="{{ route('todo.delete', $index) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background-color:red; color:white; border:none; padding:5px 10px; border-radius:4px;">
                        Delete
                    </button>
                </form>
            </li>
        @empty
            <li>No tasks yet!</li>
        @endforelse
    </ul>

</body>
</html>

{{-- clear the session data using JavaScript when the tab is closed --}}
<script>
    window.addEventListener('unload', function () {
        navigator.sendBeacon('/clear-session');
    });
</script>