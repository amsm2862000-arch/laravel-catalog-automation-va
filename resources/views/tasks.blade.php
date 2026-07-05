<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدير المهام المتكامل</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .container {
            background: white;
            width: 100%;
            max-width: 500px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #4f46e5;
            margin-bottom: 20px;
        }
        .form-group {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 2px solid #e5e7eb;
            border-radius: 6px;
            font-size: 16px;
            outline: none;
        }
        input[type="text"]:focus {
            border-color: #4f46e5;
        }
        button.add-btn {
            background-color: #4f46e5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        button.add-btn:hover {
            background-color: #4338ca;
        }
        .task-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            border-bottom: 1px solid #f3f4f6;
        }
        .task-title {
            font-size: 16px;
            cursor: pointer;
        }
        .completed {
            text-decoration: line-through;
            color: #9ca3af;
        }
        .delete-btn {
            background-color: #ef4444;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #dc2626;
        }
        .inline-form {
            display: inline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📝 قائمة مهامي</h1>

    <!-- نموذج إضافة مهمة جديدة -->
    <form action="{{ route('tasks.store') }}" method="POST" class="form-group">
        @csrf
        <input type="text" name="title" placeholder="اكتب مهمة جديدة هنا..." required>
        <button type="submit" class="add-btn">إضافة</button>
    </form>

    <!-- عرض قائمة المهام -->
    <ul class="task-list">
        @foreach($tasks as $task)
            <li class="task-item">
                <!-- الضغط على اسم المهمة يغير حالتها بين مكتملة وغير مكتملة -->
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="inline-form">
                    @csrf
                    @method('PATCH')
                    <span onclick="this.parentNode.submit();" class="task-title {{ $task->is_completed ? 'completed' : '' }}">
                        {{ $task->title }}
                    </span>
                </form>

                <!-- زر حذف المهمة -->
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">حذف</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

</body>
</html>
