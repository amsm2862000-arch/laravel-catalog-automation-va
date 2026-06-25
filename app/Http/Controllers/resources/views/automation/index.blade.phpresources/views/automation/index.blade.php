<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical VA - Catalog Automation Dashboard</title>
    <style>
        :root {
            --bg-main: #0f172a;
            --bg-card: #1e293b;
            --accent: #38bdf8;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --border: #334155;
            --success: #10b981;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        body {
            background-color: var(--bg-main);
            color: var(--text-main);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .dashboard-container {
            width: 100%;
            max-width: 650px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5);
        }
        .header {
            text-align: center;
            margin-bottom: 28px;
        }
        .header h1 {
            color: var(--accent);
            font-size: 1.75rem;
            margin-bottom: 8px;
        }
        .header p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }
        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid var(--success);
            color: var(--success);
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 24px;
            text-align: center;
            font-size: 0.9rem;
        }
        .upload-zone {
            border: 2px dashed var(--border);
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .upload-zone:hover {
            border-color: var(--accent);
            background: rgba(56, 189, 248, 0.02);
        }
        .upload-icon {
            font-size: 2.5rem;
            margin-bottom: 12px;
            display: block;
        }
        .upload-zone label {
            color: var(--text-main);
            font-weight: 500;
            cursor: pointer;
        }
        .upload-zone span {
            display: block;
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: 6px;
        }
        .btn-submit {
            display: block;
            width: 100%;
            padding: 14px;
            background: var(--accent);
            color: var(--bg-main);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            margin-top: 24px;
            cursor: pointer;
            transition: background 0.2s ease;
        }
        .btn-submit:hover {
            background: #0ea5e9;
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <div class="header">
            <h1>🤖 Technical VA Workflow Automation</h1>
            <p>Upload your e-commerce catalog file to trigger the background processing script and update inventory data automatically.</p>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="upload-zone" onclick="document.getElementById('catalog_file').click()">
                <span class="upload-icon">📁</span>
                <label for="catalog_file">Choose catalog data file (CSV or TXT)</label>
                <span>Maximum file size: 2MB</span>
                <input type="file" name="catalog_file" id="catalog_file" accept=".csv,.txt" required style="display: none;">
            </div>
            
            <button type="submit" class="btn-submit">Execute Automation Pipeline</button>
        </form>
    </div>

</body>
</html>
