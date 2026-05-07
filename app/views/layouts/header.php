<?php
$pageTitle = $pageTitle ?? 'College CMS';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Existing Dashboard CSS -->
    <link href="/college/public/assets/css/dashboard.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700;9..144,900&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style id="cms_global_theme">
        :root {
            --cms-bg-main: #052017;
            --cms-bg-dark: #03140f;
            --cms-bg-soft: #061811;

            --cms-card: rgba(5, 32, 23, 0.78);
            --cms-card-soft: rgba(255, 255, 255, 0.055);

            --cms-border: rgba(255, 255, 255, 0.11);
            --cms-border-strong: rgba(255, 255, 255, 0.18);

            --cms-gold: #f5c84b;
            --cms-gold-light: #ffe27a;
            --cms-gold-dark: #f0b92e;
            --cms-gold-soft: rgba(245, 200, 75, 0.16);
            --cms-gold-border: rgba(245, 200, 75, 0.28);

            --cms-green: #1dbf73;
            --cms-green-soft: rgba(29, 191, 115, 0.13);

            --cms-text: #fff8e7;
            --cms-muted: rgba(255, 248, 231, 0.68);

            --cms-danger: #dc3545;
            --cms-danger-soft: rgba(220, 53, 69, 0.13);

            --cms-shadow: 0 24px 70px rgba(0, 0, 0, 0.35);
            --cms-gold-shadow: 0 18px 45px rgba(245, 200, 75, 0.18);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at 15% 15%, rgba(29, 191, 115, 0.10), transparent 30%),
                radial-gradient(circle at 85% 20%, rgba(245, 200, 75, 0.08), transparent 28%),
                linear-gradient(135deg, var(--cms-bg-main), var(--cms-bg-dark));
            color: var(--cms-text);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            letter-spacing: -0.02em;
        }

        a {
            text-decoration: none;
        }

        .card {
            background: var(--cms-card);
            color: var(--cms-text);
            border: 1px solid var(--cms-border);
            border-radius: 22px;
            box-shadow: var(--cms-shadow);
        }

        .card-header {
            background:
                linear-gradient(135deg, rgba(245, 200, 75, 0.13), rgba(255, 255, 255, 0.03)) !important;
            border-bottom: 1px solid var(--cms-border);
            color: var(--cms-text);
            font-weight: 800;
        }

        .card-body {
            color: var(--cms-text);
        }

        .table {
            color: var(--cms-text);
            border-color: var(--cms-border);
        }

        .table thead th {
            background: rgba(245, 200, 75, 0.12);
            color: var(--cms-gold);
            border-color: var(--cms-border);
        }

        .table tbody td {
            background: rgba(255, 255, 255, 0.025);
            color: var(--cms-text);
            border-color: var(--cms-border);
        }

        .table-striped > tbody > tr:nth-of-type(odd) > * {
            --bs-table-bg-type: rgba(255, 255, 255, 0.035);
            color: var(--cms-text);
        }

        .table-hover > tbody > tr:hover > * {
            --bs-table-bg-state: rgba(255, 255, 255, 0.065);
            color: var(--cms-text);
        }

        .form-label {
            color: var(--cms-text);
            font-weight: 700;
        }

        .form-control,
        .form-select {
            background-color: rgba(255, 255, 255, 0.06);
            color: var(--cms-text);
            border: 1px solid var(--cms-border);
            border-radius: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: rgba(255, 255, 255, 0.08);
            color: var(--cms-text);
            border-color: var(--cms-gold-border);
            box-shadow: 0 0 0 4px rgba(245, 200, 75, 0.12);
        }

        .form-control::placeholder {
            color: rgba(255, 248, 231, 0.42);
        }

        .form-select option {
            background: var(--cms-bg-main);
            color: var(--cms-text);
        }

        .btn {
            border-radius: 999px;
            font-weight: 700;
        }

        .btn-primary {
            border: none;
            background: linear-gradient(135deg, var(--cms-gold-light), var(--cms-gold-dark));
            color: #07331f;
            box-shadow: var(--cms-gold-shadow);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: linear-gradient(135deg, var(--cms-gold-light), var(--cms-gold-dark));
            color: #07331f;
            opacity: 0.96;
            transform: translateY(-2px);
        }

        .btn-secondary,
        .btn-outline-secondary {
            background: rgba(255, 255, 255, 0.055);
            color: var(--cms-text);
            border: 1px solid var(--cms-border);
        }

        .btn-secondary:hover,
        .btn-outline-secondary:hover {
            background: var(--cms-gold-soft);
            color: var(--cms-gold);
            border-color: var(--cms-gold-border);
            transform: translateY(-2px);
        }

        .btn-warning {
            background: var(--cms-gold-soft);
            color: var(--cms-gold);
            border: 1px solid var(--cms-gold-border);
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, var(--cms-gold-light), var(--cms-gold-dark));
            color: #07331f;
            border-color: var(--cms-gold-border);
            transform: translateY(-2px);
        }

        .btn-danger {
            background: var(--cms-danger-soft);
            color: #ffb3bd;
            border: 1px solid rgba(220, 53, 69, 0.30);
        }

        .btn-danger:hover {
            background: var(--cms-danger);
            color: #fff;
            transform: translateY(-2px);
        }

        .text-muted {
            color: var(--cms-muted) !important;
        }

        .alert {
            border-radius: 16px;
            font-weight: 700;
            border: 1px solid transparent;
        }

        .alert-success {
            background: rgba(25, 135, 84, 0.13);
            color: #9af0bf;
            border-color: rgba(25, 135, 84, 0.28);
        }

        .alert-warning {
            background: rgba(255, 193, 7, 0.13);
            color: #ffe08a;
            border-color: rgba(255, 193, 7, 0.28);
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.13);
            color: #ffb3bd;
            border-color: rgba(220, 53, 69, 0.30);
        }

        .dropdown-menu {
            background: var(--cms-bg-main);
            border: 1px solid var(--cms-border);
            border-radius: 18px;
            box-shadow: var(--cms-shadow);
            padding: 10px;
        }

        .dropdown-item {
            color: var(--cms-text);
            border-radius: 12px;
            font-weight: 700;
            padding: 10px 12px;
        }

        .dropdown-item:hover {
            background: var(--cms-gold-soft);
            color: var(--cms-gold);
        }

        .badge {
            border-radius: 999px;
            font-weight: 800;
        }

        ::selection {
            background: var(--cms-gold);
            color: #07331f;
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--cms-bg-dark);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(245, 200, 75, 0.35);
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(245, 200, 75, 0.55);
        }
    </style>

    <style id="animation_style">
        .card,
        .btn,
        .form-control,
        .form-select,
        .dropdown-item {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.36);
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>