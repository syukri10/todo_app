<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 1.5em;
        }
        form {
            background: #ffffff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 1em;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 1em;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 1em;
            color: #007bff;
            text-decoration: none;
            font-size: 0.9em;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Edit Task</title>
</head>
<body>
    <form action="{{ route('todo.update', $index) }}" method="POST">
        <h1>Edit Task</h1>
        @csrf
        <strong>Task:</strong>
        <input type="text" name="task" value="{{ $task['task'] }}" required>
        <strong>Description:</strong>
        <input type="text" name="description" value="{{ $task['description'] }}" required>
        <button type="submit">Update</button>
        <a href="{{ url('/') }}">← Back to List</a>
    </form>
</body>
</html>
