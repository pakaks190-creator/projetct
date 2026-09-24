<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #818cf8;
            --bg-color: #12181f;       /* Soft, low-glare dark background */
            --card-bg: #1a222d;        /* Distinct card background */
            --text-main: #e2e8f0;      /* Soft white text for less eye fatigue */
            --text-muted: #94a3b8;
            --border: #334155;         /* Clear, visible border color */
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
        }

        * { box-sizing: border-box; }
        
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: var(--bg-color);
            margin: 0;
            padding: 0;
            color: var(--text-main);
            line-height: 1.5;
        }

        nav {
            background: #0f172a;
            color: #fff;
            padding: 18px 36px;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: -0.025em;
            border-bottom: 1px solid var(--border);
        }

        .container {
            max-width: 960px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2);
            border: 1px solid var(--border); /* Visible card border */
            padding: 32px;
            margin-bottom: 24px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        th, td {
            text-align: left;
            padding: 14px 16px;
            border-bottom: 1px solid var(--border); /* Visible row separator border */
        }

        th { 
            background: #1e293b; 
            font-weight: 600;
            color: var(--text-muted);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-top: 1px solid var(--border);
            border-bottom: 2px solid var(--border);
        }

        tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.02);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn:hover { filter: brightness(1.1); transform: translateY(-1px); }
        .btn:active { transform: translateY(0); }

        .btn-primary { background: var(--primary); color: #fff; border-color: #4f46e5; }
        .btn-edit { background: rgba(245, 158, 11, 0.15); color: #fcd34d; border-color: rgba(245, 158, 11, 0.3); }
        .btn-delete { background: rgba(239, 68, 68, 0.15); color: #fca5a5; border-color: rgba(239, 68, 68, 0.3); }
        .btn-status { background: rgba(16, 185, 129, 0.15); color: #6ee7b7; border-color: rgba(16, 185, 129, 0.3); }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid transparent;
        }
        .status-pending { background: rgba(249, 115, 22, 0.15); color: #fdba74; border-color: rgba(249, 115, 22, 0.3); }
        .status-completed { background: rgba(16, 185, 129, 0.15); color: #6ee7b7; border-color: rgba(16, 185, 129, 0.3); }

        form.inline { display: inline; }

        input[type=text], textarea, input[type=date], select {
            width: 100%;
            padding: 10px 14px;
            margin-top: 6px;
            margin-bottom: 18px;
            border: 1px solid var(--border); /* Visible input border */
            border-radius: 6px;
            font-size: 14px;
            color: var(--text-main);
            background: #0f172a;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type=text]:focus, textarea:focus, input[type=date]:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        label { 
            font-weight: 600; 
            font-size: 13px; 
            color: var(--text-main);
            display: block;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            color: #6ee7b7;
            border: 1px solid rgba(16, 185, 129, 0.3);
            padding: 12px 18px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <nav>Francis Task Manager</nav>
    <div class="container">
        {{-- Flash message shown after add/edit/delete/status actions --}}
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        {{-- Page-specific content goes here --}}
        @yield('content')
    </div>
</body>
</html>